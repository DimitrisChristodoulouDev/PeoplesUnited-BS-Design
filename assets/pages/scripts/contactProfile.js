$(function () {


    var contactID = getUrlParameter('id');
    getContact(contactID);


    $(document.body).on('click', '#savePersonal', savePersonal);
    $(document.body).on('click', '#deleteContact', deleteContactSoft);

    /* $("#personalInfoForm").validate({
         errorElement: "span",
         errorClass: "help-block",
         focusInvalid: !1,
         rules: {
             firstName: {required:true},
             lastName:{required: true},
             mobile:{required:true, matches:"[0-9\\-\\(\\)\\s]+"},
             email:{required: true, email: true},
             countryLiving:{required: true}
         },
         messages: {
             firstName: {required: "Name is required."},
             lastName: {required: "Surname is required."},
             mobile: {required: "Email is required.", matches: 'Invalid format.'},
             email: {required: "Email is required.", email: 'Invalid email.'},
             countryLiving: {required: "Country is required."}
         },
         invalidHandler: function (e, r) {
             $(".alert-danger", $("#personalInfoForm")).show();
         },
         highlight: function (e) {
             $(e).closest(".form-group").addClass("has-error");
         },
         success: function (e) {
             e.closest(".form-group").removeClass("has-error");
             e.remove();
         },
         errorPlacement: function (e, r) {
             e.insertAfter(r.closest(".input-icon"));
         },
         submitHandler: function (form) {
             return false;
             // console.log('Submit')
         }
     });*/
})

function getContact(contactID) {
    callAjax('contact/' + contactID).done(function (response) {
        handlebarsRenderTemplate('#profileSidebarTemplate', '#profileSidebar', response);
        handlebarsRenderTemplate('#personalInfoFormTemplate', '#personalInfoForm', response);
        handlebarsRenderTemplate('#contactPagebarTemplate', '#contactPagebar', response);

        $('.selectpicker').selectpicker('refresh');
        $('#country').selectpicker('val', response.countryLiving);
        $(".date-picker").datepicker({format: 'yyyy-mm-dd'});


    });
}

function myHandler() {
    alert('asdasdad');
}

function savePersonal(contactID) {
    var obj = readForm('#personalInfoForm');
    var url = '/contact/' + contactID + '/edit/personal';
    console.log(url)
    callAjax(url, obj).done(function (response, xhr) {
        if (response.status = 200) {
            swal("Good job!", "Contact Updated", "success")
        } else swal('Ooops!', "Something went wrong :(", "warning")
    })
}


function deleteContactSoft(contactID) {
    var text = $(this).data('delete');
    console.log(text);

    swal({
        title: 'Delete Contact?',
        input: 'text',
        timer: 50000,
        html: 'Write the name of the contact <span class="text-danger">' + text + '</span> in order to delete. It will be shown in deleted contacts in deleted section',
        showCancelButton: true,
        inputValidator: function (value) {
            return new Promise(function (resolve, reject) {
                if (value) {
                    resolve()
                } else {
                    reject('You need to write something!')
                }
            })
        }
    }).then(function (result) {
        if (result==text)
            completeRemoving();
        else swal('Wrong input!')
    })

    /*.then(function (result) {
        if(result == text) completeRemoving()
    })*/
}

function completeRemoving() {
    var id = getUrlParameter('id')
    callAjax('contact/'+id+'/delete/soft'   ).done(function (response) {
        if(response.status === 1) window.location.reload();
    })

}
