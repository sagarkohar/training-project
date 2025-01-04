@extends("masterLayout")


@section("content")


@include("rolepermission.header")

@if(Auth::user()->hasPermissionTo('Assets.create'))
<a href="/create-assets">
    <div class="btn btn-primary my-3">
        + New Assets
    </div>

</a>
@endif
<h3 class="my-3">Assets Table</h3>

<table class="table table-bordered table-striped table-hover">

    <thead>
        <th class="text-center">SN</th>
        <th class="text-center">Name</th>

        <?php

        $permissions=Auth::user()->getAllPermissions()->whereIn('name',['Assets.view','Assets.delete','Assets.edit','Assets.record','Assets.rec_own']);

        $nu_perm=$permissions->count();

        ?>

        <th colspan="{{ $nu_perm }}" class="text-center">Actions</th>
    </thead>

    <tbody>

        <tr>
            <td class="text-center">1</td>
            <td class="text-center">Asset1</td>
            @if(Auth::user()->hasPermissionTo('Assets.view'))
            <td class="text-center"><a href="/view-assets">view</a></td>
            @endif
            @if(Auth::user()->hasPermissionTo('Assets.edit'))
            <td class="text-center"><a href="/edit-assets">edit</a></td>
            @endif

            @if(Auth::user()->hasPermissionTo('Assets.delete'))
            <td class="text-center"><a href="/delete-assets">delete</a></td>
            @endif
            @if(Auth::user()->hasPermissionTo('Assets.record'))
            <td class="text-center"><a href="/record-assets">record</a></td>
            @endif @if(Auth::user()->hasPermissionTo('Assets.rec_own'))
            <td class="text-center"><a href="/rec_own-assets">rec_own</a></td>
            @endif


        </tr>
        <tr>
            <td class="text-center">2</td>
            <td class="text-center">Asset2</td>
            @if(Auth::user()->hasPermissionTo('Assets.view'))
            <td class="text-center"><a href="/view-assets">view</a></td>
            @endif
            @if(Auth::user()->hasPermissionTo('Assets.edit'))
            <td class="text-center"><a href="/edit-assets">edit</a></td>
            @endif

            @if(Auth::user()->hasPermissionTo('Assets.delete'))
            <td class="text-center"><a href="/delete-assets">delete</a></td>
            @endif
            @if(Auth::user()->hasPermissionTo('Assets.record'))
            <td class="text-center"><a href="/record-assets">record</a></td>
            @endif @if(Auth::user()->hasPermissionTo('Assets.rec_own'))
            <td class="text-center"><a href="/rec_own-assets">rec_own</a></td>
            @endif


        </tr>
        <tr>
            <td class="text-center">3</td>
            <td class="text-center">Asset3</td>
            @if(Auth::user()->hasPermissionTo('Assets.view'))
            <td class="text-center"><a href="/view-assets">view</a></td>
            @endif
            @if(Auth::user()->hasPermissionTo('Assets.edit'))
            <td class="text-center"><a href="/edit-assets">edit</a></td>
            @endif

            @if(Auth::user()->hasPermissionTo('Assets.delete'))
            <td class="text-center"><a href="/delete-assets">delete</a></td>
            @endif
            @if(Auth::user()->hasPermissionTo('Assets.record'))
            <td class="text-center"><a href="/record-assets">record</a></td>
            @endif @if(Auth::user()->hasPermissionTo('Assets.rec_own'))
            <td class="text-center"><a href="/rec_own-assets">rec_own</a></td>
            @endif


        </tr>
    </tbody>
</table>

@endsection
