$(function () {

    getContact();

    $(document.body).on('click', '#savePersonal', savePersonal);

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

function getContact() {
    var contactID = getUrlParameter('id');
    callAjax('contact/' + contactID).done(function (response) {
        handlebarsRenderTemplate('#personalInfoFormTemplate', '#personalInfoForm', response);
        handlebarsRenderTemplate('#contactPagebarTemplate', '#contactPagebar', response);
        handlebarsRenderTemplate('#profileSidebarTemplate', '#profileSidebar', response);
        $('.selectpicker').selectpicker('refresh');
        $('#country').selectpicker('val', response.countryLiving);
        $(".date-picker").datepicker({format: 'yyyy-mm-dd'});


    });
}
function myHandler(){
    alert('asdasdad');
}

function savePersonal() {
    var obj = readForm('#personalInfoForm');
    var url = '/contact/'+getUrlParameter('id')+'/edit/personal';
    console.log(url)
   callAjax(url, obj).done(function (response, xhr) {
        if(response.status = 200){
            swal("Good job!", "Contact Updated", "success")
        }else swal('Ooops!', "Something went wrong :(","warning")
   })
}
