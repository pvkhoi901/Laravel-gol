let uccid_sim_list;

$(function () {
    "use strict";

    $(".add_activate").hide();
    $(".uccid_sim_list").hide();

    $("#provision_kind").on("change", function (e) {
        if (e.target.value === "add_preactivated") {
            $("#mdn_list").parent().removeClass("d-none");
        } else {
            $("#mdn_list").parent().addClass("d-none");
        }

        if (e.target.value === "add_activate") {
            $(".add_activate").show();
        } else {
            $(".add_activate").hide();
        }
    });

    $(".file-upload-browse").on("click", function (e) {
        var file = $(this)
            .parent()
            .parent()
            .parent()
            .find(".file-upload-default");
        file.trigger("click");
    });

    $(".file-upload-default").on("change", function () {
        $(this)
            .parent()
            .find(".form-control")
            .val(
                $(this)
                    .val()
                    .replace(/C:\\fakepath\\/i, "")
            );
    });

    const dec_list = $("#dec_list").tagsInput({
        width: "100%",
        height: 250,
        interactive: false,
    });

    const hex_list = $("#hex_list").tagsInput({
        width: "100%",
        height: 250,
        interactive: false,
    });

    uccid_sim_list = $("#uccid_sim_list").tagsInput({
        width: "100%",
        height: 100,
    });

    $("#esn").on("keypress", function (e) {
        if (e.key === "Enter") {
            e.preventDefault();

            $(this).select();

            const url = $(this).data("url");

            axios
                .get(url, {
                    params: {
                        input: e.target.value,
                    },
                })
                .then(function ({ data }) {
                    if (data?.status) {
                        if (
                            dec_list.val().includes(data?.data?.dec) ||
                            hex_list.val().includes(data?.data?.hex)
                        ) {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "ESN has been scanned",
                            });

                            return;
                        }

                        dec_list.addTag(data?.data?.dec);
                        hex_list.addTag(data?.data?.hex);
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: data?.content,
                        });
                    }
                })
                .catch(function () {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                });
        }
    });

    $("#mdn_file").on("change", function (e) {
        const url = $(this).data("url");
        const file = e.target.files[0];
        readMDNFile(url, file);
    });

    $("#agent_order_id").change(function ({ target: { value } }) {
        if (!value) {
            return;
        }

        axios({
            url: $(this).data("url").replace("agent_order_id", value),
        }).then(function ({ data: { boxes }, status }) {
            if (status === 200) {
                $("#box_id").select2({
                    data: boxes,
                });
            }
        });
    });

    $('[name="uccid_sim"]').on("change", function (e) {
        e.preventDefault();
        if (this.checked) {
            $(".uccid_sim_list").show();
        } else {
            $(".uccid_sim_list").hide();
        }
    });
});

const readMDNFile = (url, file) => {
    let formData = new FormData();
    formData.append("file", file);
    axios
        .post(url, formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        })
        .then(({ data }) => {
            if (data.status) {
                uccid_sim_list.importTags(data.data.join());
            }
        })
        .catch((e) => {
            console.log(e);
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
            });
        });
};
