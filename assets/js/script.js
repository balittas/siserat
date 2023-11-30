//event pada link

$('.halaman').on('click', function(e){

	//ambil isi href atau link
	var tujuan = $(this).attr('href');
	//tangkap elemen yg bersangkutan
	var elemenTujuan = $(tujuan);
	//
	//console.log($('body').scrollTop());
	//console.log(elemenTujuan.offset().top);


	//pindah scroll
	$('html, body').animate({
		scrollTop: elemenTujuan.offset().top - 1 //jarak buat atas dari masing2 fitur
	}, 1200, "easeInOutExpo"); //satuan milisecond
	e.preventDefault();

});

//parallax
$(window).scroll(function(){
	var wScroll = $(this).scrollTop();

$('.jumbotron img').css({
	'transform' : 'translate(0px, '+ wScroll/4 +'%)'
});

$('.jumbotron h1').css({
	'transform' : 'translate(0px, '+ wScroll/2 +'%)'
});

$('.jumbotron p').css({
	'transform' : 'translate(0px, '+ wScroll/1.2 +'%)'
});

});


//js checkbook 1
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll2").prop("checked", false);
		}
	});
});

//checkbox
$("#checkAll").click(function () {
    $(".checkbox").prop('checked', $(this).prop('checked'));
});

//checkbox2
$("#checkAll2").click(function () {
    $(".checkbox2").prop('checked', $(this).prop('checked'));
});

//checkbox3
$("#checkAll3").click(function () {
    $(".checkbox3").prop('checked', $(this).prop('checked'));
});

//checkbox4
$("#checkAll4").click(function () {
    $(".checkbox4").prop('checked', $(this).prop('checked'));
});

//checkbox5
$("#checkAll5").click(function () {
    $(".checkbox5").prop('checked', $(this).prop('checked'));
});

//checkbox6
$("#checkAll6").click(function () {
    $(".checkbox6").prop('checked', $(this).prop('checked'));
});

//checkbox7
$("#checkAll7").click(function () {
    $(".checkbox7").prop('checked', $(this).prop('checked'));
});

//checkbox8
$("#checkAll8").click(function () {
    $(".checkbox8").prop('checked', $(this).prop('checked'));
});

//checkbox9
$("#checkAll9").click(function () {
    $(".checkbox9").prop('checked', $(this).prop('checked'));
});

//checkbox10
$("#checkAll10").click(function () {
    $(".checkbox10").prop('checked', $(this).prop('checked'));
});

//dropdown
$('.dropdown-toggle').dropdown()

//upload
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

 //upload 2
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

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
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
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:300
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
//sidebar
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

//upload3
$(document).on('click', '#close-preview', function(){ 
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

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview2').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview2-clear').click(function(){
        $('.image-preview2').attr("data-content","").popover('hide');
        $('.image-preview2-filename').val("");
        $('.image-preview2-clear').hide();
        $('.image-preview2-input input:file').val("");
        $(".image-preview2-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview2-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:300
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview2-input-title").text("Change");
            $(".image-preview2-clear").show();
            $(".image-preview2-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview2").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});

//tambahdataKapas
            var i = 5;            
            
            function additem() {
//                menentukan target append
                var itemlist = document.getElementById('itemlist');
                
//                membuat element
                var row = document.createElement('tr');
                var jenis = document.createElement('td');
                var jumlah = document.createElement('td');
                var aksi = document.createElement('td');

//                meng append element
                itemlist.appendChild(row);
                row.appendChild(jenis);
                row.appendChild(jumlah);
                row.appendChild(aksi);
                          

//                membuat element input
                var jenis_input = document.createElement('input');
                jenis_input.setAttribute('name', 'atribut'+ i);
                jenis_input.setAttribute('type', 'text');
                jenis_input.setAttribute('style', 'margin-top : 10px;width: 224px;height: 35px;');

                var jumlah_input = document.createElement('input');
                jumlah_input.setAttribute('name', 'value'+ i);
                jumlah_input.setAttribute('type', 'text');
                jumlah_input.setAttribute('style', 'margin : 10px 10px 0px 10px;width: 224px;height: 35px;');


                var hapus = document.createElement('span');

//                meng append element input
                jenis.appendChild(jenis_input);                
                jumlah.appendChild(jumlah_input);
                aksi.appendChild(hapus);

                hapus.innerHTML = '<button class="btn btn-small btn-default" style="margin-top:10px;width: 5px;height: 35px;"><i class="fa fa-trash 0"></i></button>';
//                membuat aksi delete element
                hapus.onclick = function () {
                    row.parentNode.removeChild(row);
                };

                i++;
                document.getElementById('temp').value = i;
            }

//tambahdataKapuk
            var i = 5;            
            
            function additem() {
//                menentukan target append
                var itemlist = document.getElementById('itemlist2');
                
//                membuat element
                var row = document.createElement('tr');
                var jenis = document.createElement('td');
                var jumlah = document.createElement('td');
                var aksi = document.createElement('td');

//                meng append element
                itemlist.appendChild(row);
                row.appendChild(jenis);
                row.appendChild(jumlah);
                row.appendChild(aksi);
                          

//                membuat element input
                var jenis_input = document.createElement('input');
                jenis_input.setAttribute('name', 'atribut'+ i);
                jenis_input.setAttribute('type', 'text');
                jenis_input.setAttribute('style', 'margin-top : 10px;width: 224px;height: 35px;');

                var jumlah_input = document.createElement('input');
                jumlah_input.setAttribute('name', 'value'+ i);
                jumlah_input.setAttribute('type', 'text');
                jumlah_input.setAttribute('style', 'margin : 10px 10px 0px 10px;width: 224px;height: 35px;');


                var hapus = document.createElement('span');

//                meng append element input
                jenis.appendChild(jenis_input);                
                jumlah.appendChild(jumlah_input);
                aksi.appendChild(hapus);

                hapus.innerHTML = '<button class="btn btn-small btn-default" style="margin-top:10px;width: 5px;height: 35px;"><i class="fa fa-trash 0"></i></button>';
//                membuat aksi delete element
                hapus.onclick = function () {
                    row.parentNode.removeChild(row);
                };

                i++;
                document.getElementById('temp2').value = i;
            }
