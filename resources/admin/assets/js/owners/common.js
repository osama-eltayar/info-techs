

function initCitySelector(){
    $('#city-selector').select2({
        placeholder: "City",
        allowClear: false,
        ajax: {
            url: function() {
                return `/api/cities?country=${countryId}`;
            },
            // global : false,
            dataType: "json",
            processResults: function(data) {
                return mapSelect2Data(data);
            },
        },
    });
}
function initCountrySelector(){
    $('#country-selector').select2({
        placeholder: "Country",
        allowClear: false,
        ajax: {
            url: function() {
                return `/api/countries`;
            },
            // global : false,
            dataType: "json",
            processResults: function(data) {
                return mapSelect2Data(data);
            },
        },
    });
}

function onSelectMaterials(event){
    if (!materialsFormData)
        materialsFormData = new FormData();


    Array.from(event.target.files).forEach(file=>{
        materialsFormData.append(`files[${file.name}]`,file)
        materials.push(file)
    })
}

function onDeleteMaterials(idx){
    if (materials[idx].id){
        $.ajax({
            url : materials[idx].deleteUrl,
            type : 'DELETE'
        })
    }
    else{
        materialsFormData.delete(`files[${materials[idx].name}]`)
    }
    materials = materials.filter((material,index)=>{
        return idx != index;
    })

}

function appendMaterials(formData){
    if (materialsFormData)
        materialsFormData.forEach(file=>{
            formData.append('materials[]',file)
        })
    return formData;
}

function viewMaterials(){
    $('#materials-container').html('')
    materials.forEach((material,idx)=>{
        $('#materials-container').append(`
                                        <div class="file-info">
                                               <span>
                                                    ${material.name}
                                                    <button class="remove-btn delete-material-btn" data-idx="${idx}" type="button">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </span>
                                         </div>`)
    })
}
