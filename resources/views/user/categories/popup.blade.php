@section('title', trans('cruds.category.title_singular'))
<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
        {{ trans('global.show') }} {{ trans('cruds.category.title_singular') }}
        </h6>
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-sbooked">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.name') }}
                        </th>
                        <td>
                            {{ $category->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.abbreviation') }}
                        </th>
                        <td>
                            {{ $category->abbreviation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.description') }}
                        </th>
                        <td>
                            {{ $category->description ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date created:
                        </th>
                        <td>
                            <time>{{ $category->created_at }} </time>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date modified:
                        </th>
                        <td>
                            <time>{{ $category->updated_at }} </time>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Created by:
                        </th>
                        <td>
                            {{ $category->created_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Modified by:
                        </th>
                        <td>
                            {{ $category->modified_by }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
