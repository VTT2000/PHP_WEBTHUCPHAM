@extends('layouts.admin')
@section('content')
<div class="x_panel">
    <div class="x_title">
        <h2> <?= $modelName ?> <small>Thêm</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">

    <?php 
        if (!empty($success)) { 
    ?>
            <h3>Thêm sản phẩm thành công.</h3><a href="{{route('listing.index',['model'=>$modelName])}}">Danh sách sản phẩm </a>
    <?php 
        }
        else {
    ?>
            <br />
            <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" action="{{route('add.store',['model'=>$modelName])}}" >
                @csrf
                <?php
                if (!empty($configs)) {
                    foreach ($configs as $config) {
                        switch ($config['type']) {
                            case 'text':
                                $field = $config['field'];
                                ?>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 "><?= $config['name'] ?></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" name="<?= $config['field'] ?>" placeholder="<?= htmlspecialchars($config['name']) ?>" class="@error($field) is-invalid @enderror" />
                                        @error($field)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <?php
                                break;
                            case 'number':
                                $field = $config['field'];
                                ?>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 "><?= $config['name'] ?></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" name="<?= $config['field'] ?>" placeholder="<?= htmlspecialchars($config['name']) ?>" class="@error($field) is-invalid @enderror" />
                                        @error($field)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <?php
                                break;
                            case 'image':
                                ?>
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 "><?= $config['name'] ?></label>
                                    <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" name="<?= $config['field'] ?>" placeholder="<?= htmlspecialchars($config['name']) ?>" class="@error($field) is-invalid @enderror" />
                                        @error($field)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <?php
                                break; 
                        }
                    }
                    ?>
                    <div class = "form-group">
                        <div class = "col-md-9 col-sm-9  offset-md-3">
                            <button type = "submit" class = "btn btn-success">Submit</button>
                        </div>
                    </div>
                <?php } ?>
            </form>
        <?php } ?>
    </div>
</div>
@endsection