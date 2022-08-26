<table class="table table-striped table-hover" id="datatable">
    <thead>
        <tr>
            <th>
                #
            </th>

            <th>
                Date
            </th>
            <th>
                No
            </th>
            <th>
                Channel Info
            </th>
            <th>
                YouTube Category
            </th>
            <th>
                Subscribers
            </th>
            <th>
                Avg.Views
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($youtube_ranks as $key => $youtube_rank)
        <tr class="table-">
            <td>
                {{$key + 1}}
            </td>
            <td>
                {{date('d-m-Y', strtotime($youtube_rank->created_at))}}
            </td>
            <td>
                <span>
                    @if($key < 3) <a class="link clearfix" href="{{$youtube_rank->channel}}" target="_blank">
                        <img src="{{ asset('assets/images/'.$key.'.png') }}" class="avatar pull-left">
                        <span>
                            @if($youtube_rank->no_index_type == 'up')
                            <i class="fas fa-arrow-up"></i>
                            @elseif($youtube_rank->no_index_type == 'down')
                            <i class="fas fa-arrow-down"></i>
                            @endif
                            {{$youtube_rank->no_index_number}}
                        </span>
                        </a>

                        @else
                        {{$youtube_rank->no_index}}
                        <span>
                            @if($youtube_rank->no_index_type == 'up')
                            <i class="fas fa-arrow-up"></i>
                            @elseif($youtube_rank->no_index_type == 'down')
                            <i class="fas fa-arrow-down"></i>
                            @endif
                            {{$youtube_rank->no_index_number}}
                        </span>
                        @endif
                </span>

            </td>
            <td>
                <a class="link clearfix" href="{{$youtube_rank->channel}}" target="_blank">
                    <img src="{{$youtube_rank->avatar}}" class="avatar pull-left">
                    <span class="title pull-left ellipsis">{{$youtube_rank->channel_name}}</span>
                </a>
            </td>
            <td>
                {{$youtube_rank->youtube_category_name}}
            </td>
            <td>
                {{$youtube_rank->subscribers}}
                <span>
                    @if($youtube_rank->subscribers_increase_type == 'up')
                    <i class="fas fa-arrow-up"></i>
                    @elseif($youtube_rank->subscribers_increase_type == 'down')
                    <i class="fas fa-arrow-down"></i>
                    @endif
                    {{$youtube_rank->subscribers_increase_number}}
                </span>
            </td>
            <td>
                {{$youtube_rank->avg_views}}
                <span>
                    @if($youtube_rank->avg_views_increase_type == 'up')
                    <i class="fas fa-arrow-up"></i>
                    @elseif($youtube_rank->avg_views_increase_type == 'down')
                    <i class="fas fa-arrow-down"></i>
                    @endif
                    {{$youtube_rank->avg_views_increase_number}}
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
