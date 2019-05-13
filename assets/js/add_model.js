function loadManufacturer() {
    $.ajax({
        'url':'services/get_manufacturer.php',
        method: "GET",
        success: function(data) {
            data = JSON.parse(data);
            var manufacturer = "<option value=''>Select Manufacturer</option>";
            for(i=0; i < data.length; i++) {
                manufacturer += "<option value='"+data[i].id+"'>"+ data[i].name +"</option>";
            }
            $('#select-manufacturer').html(manufacturer);
        }
    });
}

loadManufacturer();

function addModel() {
    var image1 = $('#image-1').prop('files')[0];
    var form_data = new FormData();
    if($('#model-name').val() == '') {
        alert("Please input model name");
    }
    else if($('#select-manufacturer').val() == '') {
        alert("Please input model manufacturer");
    }
    else if($('#model-color').val() == '') {
        alert("Please input model color");
    }
    else if($('#model-year').val() == '') {
        alert("Please input model year");
    }
    else if($('#model-reg-no').val() == '') {
        alert("Please input model reg-no");
    }
    else if($('#model-note').val() == '') {
        alert("Please input model note");
    }
    else if($('#model-count').val() == '') {
        alert("Please input model count");
    }
    else {
        form_data.append('model-name', $('#model-name').val());
        form_data.append('manufacturer_id', $('#select-manufacturer').val());
        form_data.append('model-color', $('#model-color').val());
        form_data.append('model-year', $('#model-year').val());
        form_data.append('model-reg-no', $('#model-reg-no').val());
        form_data.append('model-note', $('#model-note').val());
        form_data.append('model-count', $('#model-count').val());
        form_data.append('image_file1', image1);
    }

    $.ajax({
        url:'services/add_model.php',
        method: "POST",
        data: form_data,
        processData: false,
        contentType: false,
        success: function(data) {
            console.log(data);
            
                if( data == 'success') {
                        var msg = '<div class="alert alert-success text-center">';
                            msg += '<strong>Success!</strong> Car Model added successfully.';
                            msg += '</div>';
                }
                else if( data ==  'error') {
                        var msg = '<div class="alert alert-danger text-center">';
                            msg += '<strong>Failed!</strong> Please retry.';
                            msg += '</div>';
                }
                else {
                    var msg = '<div class="alert alert-danger text-center">';
                            msg += data;
                            msg += '</div>';
                }
                
            $('#alerts').html(msg);
            $("#alerts").show();
            $("#alerts").show().delay(5000).fadeOut();
            //location.reload();
        }
    });
}

