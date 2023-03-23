<x-admin-layout>
    <x-slot name="title">
        {{ __('Admin Dashboard | Microfluid Process Equipment') }}
    </x-slot>
    <x-slot name="metaname">
        {{ __('My Title') }}
    </x-slot>
    <x-slot name="metadesc">
        {{ __('My Description') }}
    </x-slot>
    <main style="margin-top: 58px">
        <div class="pt-4">

            <h2 class="col-md-12 header-font-size pb-5 primary-text">{{ $title }}
                @if(array_key_exists('add',$action))
                <a href="{{ route($action['add']) }}" class="btn btn-primary col-md-2 col-md-offset-10 text-center">Add</a>
                @endif
            </h2>
            <table id="list-view-table" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        @foreach($header as $name => $title)
                        <th>{{ ucfirst(str_replace('_',' ',$title)) }}</th>
                        @endforeach
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                        @foreach($header as $name => $title)
                        <td>{{ $value->$name }}</td>
                        @endforeach
                        <td>
                            @if(array_key_exists('edit', $action))
                            <a href="{{ route($action['edit'], ['id' => $value->id]) }}" class="fa fa-edit pr-3" title="Edit" class=""></a>
                            @endif
                            @if(array_key_exists('delete', $action))
                            <a href="{{ route($action['delete'], ['id' => $value->id]) }}" class="fa fa-trash pr-3" title="Delete" class=""></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</x-admin-layout>