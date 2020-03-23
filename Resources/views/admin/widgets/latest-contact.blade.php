<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ trans('blog::post.latest posts') }}</h3>
    </div><!-- /.card-header -->
    <div class="card-body no-padding">
        <table class="table table-striped">
            <tbody><tr>
                <th style="width: 10px">#</th>
                <th>{{ trans('blog::post.table.title') }}</th>
                <th>{{ trans('core::core.table.created at') }}</th>
            </tr>
            @if (isset($latestContactRequests))
                @foreach ($latestContactRequests as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->status }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div><!-- /.card-body -->
</div>
