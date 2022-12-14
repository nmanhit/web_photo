{capture assign="context"}
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Categories list</h3>
            <div class="panel-action">
                <a href="{$BASE_URL}index.php?controller=category&action=create" class="btn btn-primary">New category</a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Full Name</th>
                    <th scope="col" style="width: 135px">Action</th>
                </tr>
                </thead>
                <tbody>
                {foreach from=$users key=k item=v}
                    <tr id="category-{$v.id}">
                        <th scope="row">{$v.id}</th>
                        <td>{$v.email}</td>
                        <td>{$v.full_name}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{$BASE_URL}index.php?controller=user&action=detail&id={$v.id}" class="btn btn-primary">Edit</a>
                                <a href="{$BASE_URL}index.php?controller=user&action=delete&id={$v.id}" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
{/capture}
{include file="../templates/layout.tpl"}
