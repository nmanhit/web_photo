{capture assign="context"}
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Categories list</h3>
            <div class="panel-action">
                <a href="/demo/Controller/category/create.php" class="btn btn-primary">New category</a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col" style="width: 135px">Action</th>
                </tr>
                </thead>
                <tbody>
                    {foreach from=$categories key=k item=v}
                        <tr>
                            <th scope="row">{$v->id}</th>
                            <td>{$v->name}</td>
                            <td>{$v->description}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="/demo/Controller/category/edit.php?id={$v->id}" class="btn btn-primary">Edit</a>
                                    <button type="button" class="btn btn-danger">Delete</button>
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
