$(function () {




    getContact()
    validateForm()
})

function getContact() {
    var contactID = getUrlParameter('id')
    callAjax('contact/'+contactID).done(function (response) {
        /*var data ={
            contact: response
        }*/
        console.log(response)
        handlebarsRenderTemplate('#profileDetailsTemplate', '#profileDetails', response);
        $('.selectpicker').selectpicker('refresh');
        $(".date-picker").datepicker({format: 'yyyy-mm-dd'});
    });
}

function validateForm(){
    $form = $
}