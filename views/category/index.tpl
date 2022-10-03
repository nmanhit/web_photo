{capture assign="context"}
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Categories list</h3>
            <div class="panel-action">
                <a href="/web_photo/Controller/category/create.php" class="btn btn-primary">New category</a>
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
                        <tr id="category-{$v.id}">
                            <th scope="row">{$v.id}</th>
                            <td>{$v.name}</td>
                            <td>{$v.description}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="/web_photo/Controller/category/edit.php?id={$v.id}" class="btn btn-primary">Edit</a>
                                    <button onclick="javascript:handleDeleteCategory({$v.id})" type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
                <script type="text/javascript">
                    {literal}
                    function handleDeleteCategory(id) {
                        const url = `/web_photo/Controller/category/delete.php?id=${id}`;
                        const xhr = new XMLHttpRequest();
                        xhr.open("DELETE",url, true);
                        xhr.onload = function () {
                            const allRow = document.querySelector("table").rows;
                            for (const row of allRow) {
                                if(row.id === `category-${id}`) {
                                    row.remove();
                                }
                            }
                        }
                        xhr.send(null);
                    }
                    {/literal}
                </script>
            </table>
        </div>
    </div>
{/capture}
{include file="../templates/layout.tpl"}
