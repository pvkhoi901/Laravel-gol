$(function () {
    "use strict";

    $("[name='attr_1']").change(function ({ target: { value } }) {
        if (value) {
            $("#values_1").tagsInput({
                height: "47px",
                width: "100%",
                onChange: renderVariants,
            });
        }
    });

    $("[name='attr_2']").change(function ({ target: { value } }) {
        if (value) {
            $("#values_2").tagsInput({
                height: "47px",
                width: "100%",
                onChange: renderVariants,
            });
        }
    });

    $("[name='attr_3']").change(function ({ target: { value } }) {
        if (value) {
            $("#values_3").tagsInput({
                height: "47px",
                width: "100%",
                onChange: renderVariants,
            });
        }
    });

    $("form.variant-form").on("submit", function (event) {
        // adding rules for inputs with class 'comment'
        $(".required").each(function () {
            $(this).rules("add", {
                required: true,
            });
        });

        if (!$("form.variant-form").validate().form()) {
            event.preventDefault();
        }
    });

    $(document).on("click", ".remove-variant", function () {
        $(this).parents("tr").remove();
    });

    var table = null;

    $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
        if (!$.fn.dataTable.isDataTable("#table-variant")) {
            table = $("#table-variant").DataTable({
                responsive: true,
                paging: false,
            });
        }
    });

    // Update variant
    $("#table-variant").on("click", "button.editingTRbutton", function () {
        axios({
            url: variantUpdateUrl.replace("variantId", $(this).data("variant")),
        }).then(function (rs) {
            $('#update-variant-content').html(rs.data);
        });
    });
});

function renderVariants(e) {
    const attr_1 = $('[name="attr_1"]').val();
    const attr_2 = $('[name="attr_2"]').val();
    const attr_3 = $('[name="attr_3"]').val();

    const values_1 = $('[name="values_1"]').val().split(",");
    const values_2 = $('[name="values_2"]').val().split(",");
    const values_3 = $('[name="values_3"]').val().split(",");

    let variants = [];

    if (values_1[0] !== "" && attr_1) {
        if (values_2[0] !== "" && attr_2) {
            if (values_3[0] !== "" && attr_3) {
                values_1.forEach((val_1) => {
                    values_2.forEach((val_2) => {
                        values_3.forEach((val_3) => {
                            variants.push([val_1, val_2, val_3]);
                        });
                    });
                });
            } else {
                values_1.forEach((val_1) => {
                    values_2.forEach((val_2) => {
                        variants.push([val_1, val_2]);
                    });
                });
            }
        } else {
            values_1.forEach((val_1) => {
                variants.push([val_1]);
            });
        }
    }

    const tbody = $("#variant-preview tbody");
    tbody.empty();

    variants?.forEach((variant, index) => {
        const tr = `
            <tr>
                <td>
                    ${
                        index === 0
                            ? `
                                <input type="hidden" name="attributes[attr_1]" value="${attr_1}" />
                                <input type="hidden" name="attributes[attr_2]" value="${attr_2}" />
                                <input type="hidden" name="attributes[attr_3]" value="${attr_3}" />
                            `
                            : ""
                    }
                    <button class="btn btn-outline-danger btn-icon remove-variant">x</button>
                </td>
                <td>
                    ${
                        variant[0]
                            ? `${variant[0]}
                                <input type="hidden" name="variants[${index}][option_1]" value="${variant[0]}" />`
                            : ""
                    }
                    
                </td>
                <td>
                    ${
                        variant[1]
                            ? `${variant[1]}
                                <input type="hidden" name="variants[${index}][option_2]" value="${variant[1]}" />`
                            : ""
                    }
                </td>
                <td>
                    ${
                        variant[2]
                            ? `${variant[2]}
                                <input type="hidden" name="variants[${index}][option_3]" value="${variant[2]}" />`
                            : ""
                    }
                </td>
                <td>
                    <input class="form-control form-control-lg required" type="number" name="variants[${index}][quantity]" value="0" maxlength="7"/>
                </td>
                <td>
                    <input class="form-control form-control-lg required" type="number" name="variants[${index}][prices][retail_price]" value="0" maxlength="7"/>
                </td>
                <td>
                    <input class="form-control form-control-lg required" type="number" name="variants[${index}][prices][ne_price]" value="0" maxlength="7"/>
                </td>
                <td>
                    <input class="form-control form-control-lg required" type="number" name="variants[${index}][prices][existing_price]" value="0" maxlength="7"/>
                </td>
                <td>
                    <input class="form-control form-control-lg required" type="number" name="variants[${index}][prices][agent_price]" value="0" maxlength="7"/>
                </td>
            </tr>
        `;

        tbody.append(tr);
    });
}
