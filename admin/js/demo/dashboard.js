var product_file_path;
var seperate_index=0;
var body = document.body, 
    html = document.documentElement;
var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);

document.getElementById("dashboard_panel").style.marginTop =50;
document.getElementById("product_list").style.marginTop =50;
// $("#modal_id").click();
init_selectbox();
var total_data = {};
$('[data-toggle="tooltip"]').tooltip();
document.getElementById("apparel_check").checked = false;


function readURL(input, condition_path) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            switch(condition_path) {
                case "product_file_path":
                    product_file_path = e.target.result;
                    break;
            }
            
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#product_file").change(function() {
    readURL(this,"product_file_path");
});
function init_selectbox() {
    var url = '../../getfilelist.php';
    var xhr = new XMLHttpRequest();
    var fd = new FormData();
    xhr.open("POST", url, true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var text= xhr.responseText;
            console.log(text);
            text=text.split("ADMINSEPERATE");
            $("#multiple-select").append($('<option>', {
                value: "",
                text: "Nymbl Mockups",
                disabled: true,
                style:"font-size:16px;font-weight:bold;color:#607d8b;"
            }));
            var lines = text[0].split("<br>");
            console.log(lines);
            for(var j=0; j<lines.length-1; j++) {
                var arrs = lines[j].split(" width:");
                var name = arrs[0].split("name:")[1];
                arrs = arrs[1].split(" ");
                var wid_val = arrs[0];
                var he_val = arrs[1].split("height:")[1];
                var rect_x_offset1 = arrs[2].split("x:")[1];
                var rect_y_offset1 = arrs[3].split("y:")[1];
                var blend_mode, opacity;
                if(arrs[4])
                    blend_mode = arrs[4].split("blend_mode:")[1];
                if(arrs[5])
                    opacity = arrs[5].split("opacity:")[1];
                total_data[name]={width: wid_val, height: he_val, x: rect_x_offset1, y: rect_y_offset1, blend_mode: blend_mode, opacity: opacity};
                $("#multiple-select").append($('<option>', {
                    value: name,
                    text: name,
                    style:"padding-left:10px;"
                }));
            }
            seperate_index = j+1;
            
            if(text.length>1) {
                $("#multiple-select").append($('<option>', {
                    value: "",
                    text: "Custom Mockups",
                    disabled: true,
                    style:"font-size:16px;font-weight:bold;color:#607d8b;"
                }));
                lines = text[1].split("<br>");
                console.log(lines);
                for(var j=0; j<lines.length-1; j++) {
                    var arrs = lines[j].split(" width:");
                    var name = arrs[0].split("name:")[1];
                    arrs = arrs[1].split(" ");
                    var wid_val = arrs[0];
                    var he_val = arrs[1].split("height:")[1];
                    var rect_x_offset1 = arrs[2].split("x:")[1];
                    var rect_y_offset1 = arrs[3].split("y:")[1];
                    var blend_mode, opacity;
                    if(arrs[4])
                        blend_mode = arrs[4].split("blend_mode:")[1];
                    if(arrs[5])
                        opacity = arrs[5].split("opacity:")[1];
                    total_data[name]={width: wid_val, height: he_val, x: rect_x_offset1, y: rect_y_offset1, blend_mode: blend_mode, opacity: opacity};
                    $("#multiple-select").append($('<option>', {
                        value: name,
                        text: name,
                        style:"padding-left:10px;"
                    }));
                }
            } else {
                seperate_index = 0;
            }
            $("#multiple-select").attr('size',$('#multiple-select option').length+2);
            console.log(total_data);
        }
    }
    
    fd.append("adminid",adminid);
    fd.append("userid", userid);
    xhr.send(fd);
}

function uploadFile() {
  var url = '../upload.php';
  var xhr = new XMLHttpRequest();
  var fd = new FormData();
  xhr.open("POST", url, true);
  xhr.onreadystatechange = function() {
    if(xhr.readyState == 4 && xhr.status == 200) {
        var text= xhr.responseText;
        console.log(text);
        
        $(".btn").prop("disabled", false);
        $("#product_file").prop("disabled", false);
        $("#upload_btn").prop("disabled", false);
        $(".loader").hide();
        $("#viewproduct_btn").prop("disabled", false);
        $("#multiple-select").append($('<option>', {
            value: $("#pr-name").val(),
            text: $("#pr-name").val(),
            style:"padding-left:10px;"
        }));
        total_data[$("#pr-name").val()]={width: $("#art-width").val(), height: $("#art-height").val(), x: $("#art-x").val(), y: $("#art-y").val(), blend_mode: $("#blend_mode").val().toLowerCase(), opacity: $("#opacity").val()};
        $("#multiple-select").attr('size',$('#multiple-select option').length+2);
        $("#modal_id").click();
    }
  }
  fd.append("product_file", $("#product_file")[0].files[0]);
  fd.append("mask_file", $("#mask_file")[0].files[0]);
  fd.append("shadow_file", $("#shadow_file")[0].files[0]);
  fd.append("texture-dark_file", $("#texture-dark_file")[0].files[0]);
  fd.append("texture-white_file", $("#texture-white_file")[0].files[0]);
//   console.log($("#product_file").val());
//   console.log($("#product_file")[0].files[0]);
//   console.log($("#shadow_file").val());
//   console.log($("#shadow_file")[0].files[0]);
  fd.append("product_name",$("#pr-name").val());
  fd.append("product_code",$("#pr-code").val());
  fd.append("product_cost",$("#pr-cost").val());
  fd.append("product_price",$("#pr-price").val());
  console.log(document.getElementById("pr-name"));
  fd.append("mask_name",$("#mask-name").val());
  fd.append("shadow_name",$("#shadow-name").val());
  fd.append("texture-dark_name",$("#texture-dark-name").val());
  fd.append("texture-white_name",$("#texture-white-name").val());
  fd.append("width",$("#art-width").val());
  fd.append("height",$("#art-height").val());
  fd.append("dpi",$("#art-dpi").val());
  fd.append("x",$("#art-x").val());
  fd.append("y",$("#art-y").val());
  fd.append("blend_mode",$("#blend_mode").val().toLowerCase());
  fd.append("provider",$("#provider").val());
  fd.append("print_location",$("#print_location").val());
  fd.append("print_mode",$("#print_mode").val());
  console.log($("#provider").val());
  fd.append("opacity",$("#opacity").val());
  fd.append("userid", userid);
  fd.append("adminid", adminid);
  fd.append("mockup_list",$("#checkbox1").is(":checked"));
  
  xhr.send(fd);
}
$(".loader").hide();
$("#viewproduct_btn").prop("disabled", true);

function viewproduct() {
    // window.location.href= '../../?product='+$("#pr-name").val();
    var win = window.open('../../home.php?product='+$("#pr-name").val()+"&w="+$("#art-width").val()+"&h="+$("#art-height").val()+"&x="+$("#art-x").val()+"&y="+$("#art-y").val()+"&bm="+$("#blend_mode").val().toLowerCase()+"&o="+$("#opacity").val(), '_blank');
    win.focus();
}

function viewlistproduct() {
    // console.log($("#multiple-select").find(":selected").text());
    console.log('../../?product='+$("#multiple-select").find(":selected").text());
    var index=$("#multiple-select").find(":selected").text();
    var win = window.open('../../home.php?product='+$("#multiple-select").find(":selected").text()+"&w="+total_data[index].width+"&h="+total_data[index].height+"&x="+total_data[index].x+"&y="+total_data[index].y+"&bm="+total_data[index].blend_mode+"&o="+total_data[index].opacity, '_blank');
    // var win = window.open('../../admin/dashboard/index.php?product='+$("#multiple-select").find(":selected").text()+"&w="+total_data[index].width+"&h="+total_data[index].height+"&x="+total_data[index].x+"&y="+total_data[index].y+"&bm="+total_data[index].blend_mode+"&o="+total_data[index].opacity, '_blank');
    win.focus();
    //window.location.href = '../../?product='+$("#multiple-select").find(":selected").text();
}

function deleteproductfromlist() {
    
    var url = '../delete.php';
    var xhr = new XMLHttpRequest();
    var fd = new FormData();
    xhr.open("POST", url, true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var text= xhr.responseText;
            console.log(text);
            $(".btn").prop("disabled", false);
            $("#product_file").prop("disabled", false);
            $("#upload_btn").prop("disabled", false);
            $(".loader").hide();
            $("#viewproduct_btn").prop("disabled", false);
            $("#multiple-select").attr('size',$('#multiple-select option').length+2);
            $("#multiple-select option:selected").remove();
            // $("#multiple-select").html("");
            // init_selectbox();
        }
    }
    fd.append("userid", userid);
    fd.append("adminid",adminid);
    fd.append("product_name",$("#multiple-select").find(":selected").text());
    xhr.send(fd);
}
function deleteproduct() {
    if(adminid != "admin") {
        if($("#multiple-select option:selected").index()>seperate_index) {
            if($("#multiple-select option:selected").length>0)
                $("#modal_id1").click();
        }
    } else {
        if($("#multiple-select option:selected").length>0)
                $("#modal_id1").click();
    }
}
$('#multiple-select').change(function() {
    if(adminid != "admin") {
        if($("#multiple-select option:selected").index()>seperate_index) {
            $("#deleteproduct_btn").prop("disabled",false);
        } else {
            $("#deleteproduct_btn").prop("disabled",true);
        }
    }
});
function upload() {
  if(!$("#product_file")[0].files[0])
  {
    alert('Please add the product file');
    return;
  }
  if(!$("#mask_file")[0].files[0])
  {
    alert('Please add the mask file');
    return;
  }
  if(!$("#shadow_file")[0].files[0])
  {
    alert('Please add the shadow file');
    return;
  }
  if(!$("#pr-name").val())
  {
    alert('Please input the name correctly');
    return;
  }
  if(!$("#mask-name").val())
  {
    alert('Please input the name correctly');
    return;
  }
  if(!$("#art-width").val())
  {
      $("#art-width").val(0);
    // alert('Please input the dimension width');
    // return;
  }
  if(!$("#art-height").val())
  {
      $("#art-height").val(0);
    // alert('Please input the dimension height');
    // return;
  }
  $("#uploadconfirm_btn").click();
  
}
function needupload() {
    $("#uploadmodal").modal("hide");
    $(".loader").show();
    $(".btn").prop("disabled", true);
    $("#product_file").prop("disabled", true);
    $("#upload_btn").prop("disabled", true);
    uploadFile();
}

function needwarp() {
    var form = document.createElement('form');
    form.style.display = "none";
    form.method ="post";
    form.enctype="multipart/form-data";
    form.action = "../../edit/";
    var warp = document.createElement('input');
    warp.type = "text";
    warp.name = "warp";
    warp.value = "warp";
    form.appendChild(warp); //$("#product_file")[0].files[0]
    // alert(product_file_path);
    // var product_fpath = document.createElement('input');
    // product_fpath.type = "text";
    // product_fpath.name = "product_file_path";
    // product_fpath.value = product_file_path;
    // form.appendChild(product_fpath);
    form.appendChild(document.getElementById("product_file"));
    form.appendChild(document.getElementById("mask_file"));
    form.appendChild(document.getElementById("shadow_file"));
    form.appendChild(document.getElementById("texture-dark_file"));
    form.appendChild(document.getElementById("texture-white_file"));
    // console.log($("#product_file").val());
    // console.log($("#product_file")[0].files[0]);
    // console.log($("#shadow_file").val());
    // console.log($("#shadow_file")[0].files[0]);
    
    var temp = document.getElementById("pr-name");
    var pr_name = document.createElement('input');
    pr_name.type = "text";
    pr_name.name = temp.name;
    pr_name.value = temp.value;
    console.log(pr_name);
    form.appendChild(pr_name);

    temp = document.getElementById("pr-code");
    var pr_code = document.createElement('input');
    pr_code.type = "text";
    pr_code.name = temp.name;
    pr_code.value = temp.value;
    console.log(pr_code);
    form.appendChild(pr_code);

    temp = document.getElementById("pr-cost");
    var pr_cost = document.createElement('input');
    pr_cost.type = "text";
    pr_cost.name = "pr-cost";
    if(temp != null) {
        pr_cost.value = temp.value;
    } else {
        pr_cost.value = 0;
    }
    form.appendChild(pr_cost);

    temp = document.getElementById("pr-price");
    var pr_price = document.createElement('input');
    pr_price.type = "text";
    pr_price.name = "pr-price";
    if(temp != null) {
        pr_price.value = temp.value;
    } else {
        pr_price.value = 0;
    }
    form.appendChild(pr_price);
    
    // form.appendChild("mask_name",$("#mask-name").val());
    // form.appendChild("shadow_name",$("#shadow-name").val());
    // form.appendChild("texture-dark_name",$("#texture-dark-name").val());
    // form.appendChild("texture-white_name",$("#texture-white-name").val());
    temp = document.getElementById("art-width");
    var art_width = document.createElement('input');
    art_width.type = "text";
    art_width.name = temp.name;
    art_width.value = temp.value;
    form.appendChild(art_width);
    console.log(art_width);
    // form.appendChild(document.getElementById("art-width"));

    temp = document.getElementById("art-height");
    var art_height = document.createElement('input');
    art_height.type = "text";
    art_height.name = temp.name;
    art_height.value = temp.value;
    form.appendChild(art_height);

    temp = document.getElementById("art-dpi");
    var art_dpi = document.createElement('input');
    art_dpi.type = "text";
    art_dpi.name = temp.name;
    art_dpi.value = temp.value;
    form.appendChild(art_dpi);
    // form.appendChild(document.getElementById("art-height"));

    temp = document.getElementById("art-x");
    var art_x = document.createElement('input');
    art_x.type = "text";
    art_x.name = temp.name;
    art_x.value = temp.value;
    form.appendChild(art_x);
    // form.appendChild(document.getElementById("art-x"));

    temp = document.getElementById("art-y");
    var art_y = document.createElement('input');
    art_y.type = "text";
    art_y.name = temp.name;
    art_y.value = temp.value;
    form.appendChild(art_y);

    // form.appendChild(document.getElementById("art-y"));

    temp = document.getElementById("blend_mode");
    var blend_mode = document.createElement('input');
    blend_mode.type = "text";
    blend_mode.name = "blend_mode";
    blend_mode.value = $("#blend_mode").val().toLowerCase();
    form.appendChild(blend_mode);

    temp = document.getElementById("provider");
    var provider = document.createElement('input');
    provider.type = "text";
    provider.name = "provider";
    provider.value = $("#provider").val();
    form.appendChild(provider);

    temp = document.getElementById("print_location");
    var print_location = document.createElement('input');
    print_location.type = "text";
    print_location.name = "print_location";
    // print_location.value = $("input[name=radios]:checked").val();
    print_location.value =$("#print_location").val();
    form.appendChild(print_location);

    temp = document.getElementById("print_mode");
    var print_mode = document.createElement('input');
    print_mode.type = "text";
    print_mode.name = "print_mode";
    print_mode.value = $("#print_mode").val();
    form.appendChild(print_mode);
    // form.appendChild(document.getElementById("blend_mode"));

    temp = document.getElementById("opacity");
    var opacity = document.createElement('input');
    opacity.type = "text";
    opacity.name = temp.name;
    opacity.value = temp.value;
    form.appendChild(opacity);
    // form.appendChild(document.getElementById("opacity"));

    var userid_input = document.createElement('input');
    userid_input.type = "text";
    userid_input.name = "userid";
    userid_input.value = userid;
    form.appendChild(userid_input);
    // form.appendChild("userid", userid);
    var adminid_input = document.createElement('input');
    adminid_input.type = "text";
    adminid_input.name = "adminid";
    adminid_input.value = adminid;
    form.appendChild(adminid_input);
    // form.appendChild("adminid", adminid);
    var mockup_list_input = document.createElement('input');
    mockup_list_input.type = "text";
    mockup_list_input.name = "mockup_list";
    mockup_list_input.value = $("#checkbox1").is(":checked");
    form.appendChild(mockup_list_input);
    // form.appendChild("mockup_list",$("#checkbox1").is(":checked"));
    $("body").append(form);
    console.log(form);
    form.submit();
}
// $("#question_mark").on('click', function() {
    
// });
$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});
$(document).on('click', '#close-preview1', function(){ 
    $('.image-preview1').popover('hide');
    // Hover befor close the preview
    $('.image-preview1').hover(
        function () {
           $('.image-preview1').popover('show');
        }, 
         function () {
           $('.image-preview1').popover('hide');
        }
    );    
});
$(document).on('click', '#close-preview2', function(){ 
    $('.image-preview2').popover('hide');
    // Hover befor close the preview
    $('.image-preview2').hover(
        function () {
           $('.image-preview2').popover('show');
        }, 
         function () {
           $('.image-preview2').popover('hide');
        }
    );    
});

$(document).on('click', '#close-preview3', function(){ 
    $('.image-preview3').popover('hide');
    // Hover befor close the preview
    $('.image-preview3').hover(
        function () {
           $('.image-preview3').popover('show');
        }, 
         function () {
           $('.image-preview3').popover('hide');
        }
    );    
});
$(document).on('click', '#close-preview4', function(){ 
    $('.image-preview4').popover('hide');
    // Hover befor close the preview
    $('.image-preview4').hover(
        function () {
           $('.image-preview4').popover('show');
        }, 
         function () {
           $('.image-preview4').popover('hide');
        }
    );    
});
$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    
    var closebtn1 = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview1',
        style: 'font-size: initial;',
    });
    closebtn1.attr("class","close pull-right");

    var closebtn2 = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview2',
        style: 'font-size: initial;',
    });
    closebtn2.attr("class","close pull-right");

    var closebtn3 = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview3',
        style: 'font-size: initial;',
    });
    closebtn3.attr("class","close pull-right");

    var closebtn4 = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview4',
        style: 'font-size: initial;',
    });
    closebtn4.attr("class","close pull-right");

// Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    $('.image-preview1').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn1)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    $('.image-preview2').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn2)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    $('.image-preview3').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn3)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    $('.image-preview4').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn4)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    $('.image-preview-clear1').click(function(){
        $('.image-preview1').attr("data-content","").popover('hide');
        $('.image-preview-filename1').val("");
        $('.image-preview-clear1').hide();
        $('.image-preview-input1 input:file').val("");
        $(".image-preview-input-title1").text("Browse"); 
    }); 
    $('.image-preview-clear2').click(function(){
        $('.image-preview2').attr("data-content","").popover('hide');
        $('.image-preview-filename2').val("");
        $('.image-preview-clear2').hide();
        $('.image-preview-input2 input:file').val("");
        $(".image-preview-input-title2").text("Browse"); 
    }); 
    $('.image-preview-clear3').click(function(){
        $('.image-preview3').attr("data-content","").popover('hide');
        $('.image-preview-filename3').val("");
        $('.image-preview-clear3').hide();
        $('.image-preview-input3 input:file').val("");
        $(".image-preview-input-title3").text("Browse"); 
    }); 
    $('.image-preview-clear4').click(function(){
        $('.image-preview4').attr("data-content","").popover('hide');
        $('.image-preview-filename4').val("");
        $('.image-preview-clear4').hide();
        $('.image-preview-input4 input:file').val("");
        $(".image-preview-input-title4").text("Browse"); 
    }); 
    // Create the preview image
    $("#apparel_check").change( function() {
        if($("#apparel_check").is(':checked')){
            $("#width_height").hide();
        } else {
            $("#width_height").show();
        }
    });
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:150,
            height:100
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            // img.attr('src', e.target.result);
            // $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
    $(".image-preview-input1 input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic1',
            width:150,
            height:100
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title1").text("Change");
            $(".image-preview-clear1").show();
            $(".image-preview-filename1").val(file.name);            
            // img.attr('src', e.target.result);
            // $(".image-preview1").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
    $(".image-preview-input2 input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic2',
            width:150,
            height:100
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title2").text("Change");
            $(".image-preview-clear2").show();
            $(".image-preview-filename2").val(file.name);            
            // img.attr('src', e.target.result);
            // $(".image-preview1").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
    $(".image-preview-input3 input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic3',
            width:150,
            height:100
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title3").text("Change");
            $(".image-preview-clear3").show();
            $(".image-preview-filename3").val(file.name);            
            // img.attr('src', e.target.result);
            // $(".image-preview1").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
    $(".image-preview-input4 input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic4',
            width:150,
            height:100
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title4").text("Change");
            $(".image-preview-clear4").show();
            $(".image-preview-filename4").val(file.name);            
            // img.attr('src', e.target.result);
            // $(".image-preview1").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
    $("#pr-name").keyup(function (e) {
        $("#viewproduct_btn").prop("disabled", true);
        $("#mask-name").val($("#pr-name").val()+"-mask");
        $("#shadow-name").val($("#pr-name").val()+"-shadow");
        $("#texture-dark-name").val($("#pr-name").val()+"-texture-dark");
        $("#texture-white-name").val($("#pr-name").val()+"-texture-white");
    }); 

    
});