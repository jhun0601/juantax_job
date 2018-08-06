(function() {

	if(isset(window.location.hash.split('#')[1]) && window.location.hash.split('#')[1] == 'contacts'){
		$('#contact-list li').removeClass('active');
		$('#contact-container .tab-pane').removeClass('active');

		$('[href="#contact-list"]').parent().addClass('active');
		$('#contact-list').addClass('active');
		$('#error-one').show();
		$('#import').show();
		
	}
	$('[href="#contact-pane"]').unbind('click').bind('click', function() {
		$('#error-one').hide();
		$('#import').hide();
		$('.file-selected').html('No file selected');
	});

	
	getList();
	addContact();
	importProcess();

	$('#import').hide();
    
	$('#select_country').val('Philippines');

	$('#downloadCSV').unbind('click').bind('click', function() {

	    var data = [["Organization Type","First Name","Middle Name","Last Name","Organization Name","Address","City","Country","Postal","TIN","Phone","Email"]];
	    var csvContent = "data:text/csv;charset=utf-8,";
	        data.forEach(function(infoArray, index){
	            dataString = infoArray.join(",");
	            csvContent += index < data.length ? dataString+ "\n" : dataString;
	        });

	    var encodedUri = encodeURI(csvContent);
	    var link = document.createElement("a");
	    link.setAttribute("href", encodedUri);
	    link.setAttribute("download", "Contact_CSV_Template.csv");
	    document.body.appendChild(link); // Required for FF

	    link.click();

    });


})();

function disabledMask(){
	var phone 	= $('#phone');
	var country = $("#select_country option:selected").text();

	if(country!='Philippines'){
		phone.mask('000000000000000');
	}
	else{
		phone.mask('0000000');
	}
}


function getList() {

    var table = '#contacts-table';
 	var url   = '/contacts/getList';

	base.
		bootgridAction(table).
		bootgridDelete(table, '/contacts/deleteContacts');

	$(table).bootgrid({
		css     : helper.icon,
		labels  : helper.label,
		ajax         : true,
		url          : url,
		selection    : true,
		multiSelect  : true,
		navigation   : 2,
		formatters	 : {
			type : function(column, row) {
				if(row['type'] == 'individual') {
					return '<button class="btn btn-primary btn-xs waves-effect">Individual</button>';
				} else {
					return '<button class="btn btn-primary btn-xs waves-effect bgm-green">Non-Individual</button>';
				}
			},
			name : function(column, row) {
				return '<h4 class="">'+row['name']+'</h4>';
			},
			last_updated : function(column, row) {
            	return (row['date_updated'] != '') ? moment.unix(row['date_updated']).format('MMM DD, YYYY, h:mm A') : '' ;
            },
		}
	}).on('click.rs.jquery.bootgrid', function (e,columns,rows) {
		if(isset(rows)) {
			var userId = rows.id;
	        window.location = '/contacts/info/'+userId;
		}

	}).on('loaded.rs.jquery.bootgrid', function(){
		var total = $(table).bootgrid('getTotalRowCount');
		
		$('#contacts-table-count').html(total+' Record(s)');
    	
    	if(total == 0){
        	var buttonType = 'button-add-contact';
        	var FIRST_ENTRY = 
        	'<tr><td colspan="10" class="no-results">'+
        	'<div style="margin-top: 50px;">'+
	        	'<i class="fa fa-file-text-o fa-4x"></i>'+
	        	'<h2 style="text-transform: uppercase;">No Contacts Yet!</h2>'+
	    		'<p>Be the first to create contact to get started</p>'+
	    		'<button class="btn bgm-blue waves-effect '+buttonType+'">Create Contact</button>'+
    		'</div>'+
    		'</td></tr>';

        
        	$(table+' tbody').html(FIRST_ENTRY);
        	
        	addContact();
        }
	});

	return this;
}

function addContact(){

	var modal = $('#modal-contact-add');
	var save = $('#contact-add-button');
  	var save2 = $('#contact-add-button2');
  	var table = $('#contacts-table');

	var firstName 	= $('#first-name');
	var lastName 	= $('#last-name');
	var middleName 	= $('#middle-name');
	var address 	= $('#address');
	var city 		= $('#city');
	var postal		= $('#postal');
	var phone 	= $('#phone');
	var email 	= $('#email');
	var tin 	= $('#tin');
	var corporationName= $('#corporation-name');
	//To get the actual text not the value on option!
	//dont allow special char in address and city
    var specialChars = [38, 36, 34, 39, 92, 124, 96];

    //for non-individual
    corporationName.unbind('keypress').bind('keypress', function(event) {
        if($.inArray(event.which,specialChars) != -1) {
           event.preventDefault();
       }
    });

    //for first name
    firstName.unbind('keypress').bind('keypress', function(event) {
        if($.inArray(event.which,specialChars) != -1) {
           event.preventDefault();
       }
    });

    //for middle name
    middleName.unbind('keypress').bind('keypress', function(event) {
        if($.inArray(event.which,specialChars) != -1) {
           event.preventDefault();
       }
    });

    //for last name
    lastName.unbind('keypress').bind('keypress', function(event) {
        if($.inArray(event.which,specialChars) != -1) {
           event.preventDefault();
       }
    });

    //for address
    address.unbind('keypress').bind('keypress', function(event) {
        if($.inArray(event.which,specialChars) != -1) {
           event.preventDefault();
       }
    });
    //for city
    city.unbind('keypress').bind('keypress', function(event) {
        if($.inArray(event.which,specialChars) != -1) {
           event.preventDefault();
       }
    });

	var type = $('#select_type');

    
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	// show modal, unset and clearing field

	$('.button-add-contact').unbind('click').bind('click', function() {
		//unset fields


		helper.noError(firstName, 1);
		helper.noError(middleName, 1);
		helper.noError(lastName, 1);
		helper.noError(address, 1);
		helper.noError(city,1);
		helper.noError(postal,1);
		helper.noError(phone, 1);
		helper.noError(tin, 1);
		helper.noError(email, 1);
		helper.noError(corporationName,1);
		email.parent().parent().find('small').html('');
		phone.parent().parent().find('small').html('');
		tin.parent().parent().find('small').html('');
		//clear fields

		firstName.val('');
		middleName.val('');
		lastName.val('');
		address.val('');
		city.val('');
		postal.val('');
		phone.val('');
		tin.val('');
		email.val('');
		corporationName.val('');
		//hide row-contact-company
		changeType(2);
		//and show modal
		modal.modal('show');
	});

	// saving contacts
	save.unbind('click').bind('click', function() {
		//Have to declare the country variable here
		var country = $("#select_country option:selected").text();

		var error = false;
		//Added trim function so that white space is not allowed
		if(type.val()=='1'){
			((firstName.val()).trim() == '') ? (error = helper.hasError(firstName, 1)) : helper.noError(firstName, 1);
			((lastName.val()).trim() == '') ? (error = helper.hasError(lastName, 1)) : helper.noError(lastName, 1);
		}
		else{
			((corporationName.val()).trim() == '') ? (error = helper.hasError(corporationName, 1)) : helper.noError(corporationName, 1);
		}

		((address.val()).trim() == '') ? (error = helper.hasError(address, 1)) : helper.noError(address, 1);
		((city.val()).trim() == '') ? (error = helper.hasError(city, 1)) : helper.noError(city, 1);
		(postal.val() == '') ? (error = helper.hasError(postal, 1)) : helper.noError(postal, 1);

		(phone.val().length < 7 && phone.val() != '' && country == 'Philippines') ? (error = helper.hasError(phone, 1)) :
		(helper.noError(phone, 1) && phone.parent().parent().find('small').html(''));
		
		(tin.val() == '') ? (error = helper.hasError(tin, 1) && tin.parent().parent().find('small').html('')) :
			((tin.val().length != 15 && tin.val().length !=16) && tin.val() != '') ? (error = helper.hasError(tin, 1) && tin.parent().parent().find('small').html('<font color="red">(Invalid TIN number)</font>')) :
			(helper.noError(tin, 1) && tin.parent().parent().find('small').html(''));
		
		(email.val() != '' && !(testEmail.test(email.val())) ) ? (error = helper.hasError(email, 1) && email.parent().parent().find('small').html('<font color="red">(Invalid email address)</font>')) :
			(helper.noError(email, 1) && email.parent().parent().find('small').html(''));



		if(!error) {
			save.
				attr('disabled', 'disabled').
				html('Saving...');

				if(type.val()=='1'){
				var data = {
					'type' : 'individual',
					'name' : '',
					'first_name' : firstName.val(),
					'middle_name': middleName.val(),
					'last_name'	 : lastName.val(),
					'address' : address.val(),
					'city' : city.val(),
					'postal': postal.val(),
					'country': country,
					'phone'	 : phone.val(),
					'email' : email.val(),
					'tin'	 : tin.val()
				};
			}
				else{
				var data = {
					'type': 'nonindividual',
					'name': corporationName.val(),
					'first_name' : '',
					'middle_name': '',
					'last_name'	 : '',
					'address' : address.val(),
					'city' : city.val(),
					'postal': postal.val(),
					'country': country,
					'phone'	 : phone.val(),
					'email' : email.val(),
					'tin'	 : tin.val()
					};			
				}
		

			base.
				setUrl('contacts/addContact').
				setData(data).
				post(function(response) {
					save.
					removeAttr('disabled').
						html('Save');
					if(response.error) {
						if(response.message == 'already_member') {
							error = helper.hasError(tin, 1)
							tin.parent().parent().find('small').html('<font color="red">(Tin already exists)</font>');
						}

					}
					else {
						modal.modal('hide');

						base.notification('Contact successfully saved', 'inverse');
						//reload contact table
						table.bootgrid('reload');
					}


				}
			);
		}
		
		return false;
	});

	$("#modal-contact-add").on("hidden.bs.modal", function () {
		//To remove the blue line once the modal close
	  $('.fg-line').removeClass('fg-toggled');
	  	//To reset select picker
	$("#select_type").val('default');
	$('#select_country').val('Philippines');
	$(".selectpicker").selectpicker("refresh");

	});

}

function changeType(value){
	var elements = $('.form-control');
	if(value==1) {
		$('#row-contact-company').children().hide();
		$('#row-contact-name').children().show();

		helper.noError(elements, 1);
	}
	else {
		$('#row-contact-company').children().show();
		$('#row-contact-name').children().hide();

		helper.noError(elements, 1);
	}
}
function saveContactImport(importId) {
    var continueImport = $('#contact-import-continue');
    
    continueImport.unbind('click').bind('click', function() {
        var url = '/contacts/saveImport/'+importId;
        
        swal({
            title : "Processing CSV file",   
            text : "Just a sec! This might take a while depending on the items",   
            showConfirmButton : false 
        });

        base.
            setUrl(url).
            get(function(response) {
                
                swal({
                    title : "Hooray! Contact(s) successfully imported",
                    text  : "Your contacts have been updated",
                    type  : "success",
                    showCancelButton: true,
                    showConfirmButton: false,
                    cancelButtonText: "Close",
                    confirmButtonColor: "#DD6B55",
                });

                $('.file-selected').html(' No file selected ');
                $('#import').hide();
            }
        );

    });

    return this;
}


function importProcess() {

    var browseButton = $('#contact-import-file');
    var importButton = $('#btn-contact-import');

    browseButton.unbind('change').bind('change', function() {
        var file = document.getElementById('contact-import-file').files[0];

        if(typeof file !== 'undefined') {
            $('.file-selected').html(file.name);
            $('#crm-import-alert-error').hide();
        } else {
            $('.file-selected').html(' No file selected ');
        }
        return false;


        $('#file-selected').html(file['name']);


    });

    importButton.unbind('click').bind('click', function() {   
        var file = document.getElementById('contact-import-file').files[0];
        
        /* -------------------------------------
                START BASIC VALIDATION
           ------------------------------------- */
        //if no file selected
        if(typeof file === 'undefined') {

            $('#error-one').show();
            $('#import').hide();
            $('#error-one').removeClass('hide');
            $('#error-one-text').html('Please select a csv file before importing');
            
            return false;
        }
        //if csv file
        if(file.type != 'text/csv') {

            $('#error-one').show();
            $('#import').hide();
            $('#error-one').removeClass('hide');
            $('#error-one-text').html('Only CSV file is allowed to upload');
            
            return false;
        }

        swal({
            title : "Reading CSV file",   
            text : "Just a sec! This might take a while depending on the items",   
            showConfirmButton : false 
        });

        //at this point, all basic validation is good and we will start upload
        //create form and put the file
        var fd = new FormData();   
        var url =  '/contacts/importProcess/';      
        fd.append('file', file);

        //ajax file upload                   
        $.ajax({
            url         : url, 
            dataType    : 'json',  
            cache       : false,
            contentType : false,
            processData : false,
            data        : fd,                         
            type        : 'post',
            success     : function(response){
            $('#error-one').hide();
            $('#import').show();

            swal.close();
            
            var IMPORT_ERROR_MESSAGE = '<li class="disc-list"><b>Row [NUMBER]</b> : <br/>[MESSAGE]</li>';

            var IMPORT_REPORT = 
                '<p>Found <b>[TOTAL]</b> Contacts(s) in the imported file [FILE_NAME] </p>'+
                '<ul>'+
                    '<li><b>[SUCCESS]</b> total contact(s) will be imported <br/></li>'+
                    '<li><b>[ERROR]</b> total contact has error and will NOT be imported</li>'+
                    '<ul>'+
                        '[ERROR_MESSAGE]'+
                    '</ul>'+
                '</ul>';


            var message = '';


            helper.loop(response.data['error_message'], function(i) {
                var errorMessage = '';
                helper.loop(response.data['error_message'][i]['message'], function(x) {

                    errorMessage += '- '+response.data['error_message'][i]['message'][x]+'<br/>';
                });

                message += IMPORT_ERROR_MESSAGE.
                    replace('[NUMBER]',     response.data['error_message'][i]['line']).
                    replace('[MESSAGE]',    errorMessage);

            });

            $('#importReport').html(IMPORT_REPORT.
                    replace('[TOTAL]',          response.data['total']).
                    replace('[SUCCESS]',        response.data['success']).
                    replace('[ERROR]',          response.data['error']).
                    replace('[FILE_NAME]',      file.name).
                    replace('[ERROR_MESSAGE]',  message)
                );
            $('#import').removeClass('bgm-red');
            $('#import').removeClass('bgm-blue');
            if(response.data['success'] < 1)
                {	
                $('#import').addClass('bgm-red');	
            	$('#importCount').hide();
            	}
            else
            	{
            	$('#import').addClass('bgm-blue');
                $('#importCount').show();   
            	}
                //continue the process
                saveContactImport(response.data['id']);
                $('#contacts-table').bootgrid('reload');
            }
         });

    });

    return this;
}