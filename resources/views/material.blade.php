<div class="row box box-shadow border-2" id="de-module{{ $module_id }}-material{{ $material_id }}-type">

    <div class="row">
        <div class="col-8">
            <h3>Material{{ $material_id }}</h3>

        </div>
        <div class="col-4">

            <div class="btn btn-danger removeMaterial" data-module-id="module{{ $module_id }}-material{{ $material_id }}-type">
                Remove
            </div>

        </div>
    </div>

    <div class="col-6">
        <select name="materialtype" id="module{{ $module_id }}-material{{ $material_id }}-type" onchange="materialType({{  $module_id}},{{ $material_id }})">
            <option value="file">File</option>
            <option value="link">Link</option>
        </select>
    </div>
    <div class="col-6 my-5">
        <input type="file" name="module[{{ $module_id }}][file][]" id="module{{$module_id }}-material{{ $material_id }}-file">
        <input type="text" style="display:none" placeholder="Enter the Link" name="module[{{ $module_id }}][link][]" id="module{{$module_id }}-material{{ $material_id }}-link">


    </div>
</div>
<hr>
