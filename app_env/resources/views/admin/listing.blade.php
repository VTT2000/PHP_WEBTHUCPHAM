@extends('layouts.admin')
@section('content')
<div class="">
    <div class="page-title">
        <h3><?= $title ?></h3>
        <form class="filter-form" action="{{route('listing.index',['model'=>$modelName])}}" method="POST">
            @csrf
        </form>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <a href="{{route('add.create',['model'=>$modelName])}}"><button class = "btn btn-success">Thêm <?=$modelName?></button></a>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <?php foreach ($configs as $config) { ?>
                                    <th><?= $config['name']?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($records as $record) { ?>
                                <tr>
                                    <?php 
                                        foreach ($configs as $config) { 
                                    ?>
                                        <?php
                                        switch ($config['type']) {
                                            case "text":
                                                ?>
                                                <td><?= $record[$config['field']] ?></td>
                                                <?php
                                                break;
                                            case "image":
                                                ?>
                                                <td><img height="100" onerror="this.src=''" src="<?= $record[$config['field']] ?>" /></td>
                                                <?php
                                                break;
                                            case "number":
                                                ?>
                                                <td><?= number_format($record[$config['field']], 0, ',', '.') ?></td>
                                                <?php
                                                break;
                                            case "edit":
                                                ?>
                                                <td><a href="{{route('update.up',['model'=>$modelName])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Sửa</a></td>
                                                <?php
                                                break;
                                            case "delete":
                                                ?>
                                                <td><a href="{{route('delete.del',['model'=>$modelName])}}"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Xóa</a></td>
                                                <?php
                                                break;
                                        }
                                        ?>
                                <?php } ?>
                                </tr>
                    <?php } ?>
                        </tbody>
                    </table>
<?= $records->links("pagination::bootstrap-4") ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection