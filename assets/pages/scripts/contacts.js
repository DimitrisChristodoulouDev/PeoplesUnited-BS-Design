$(document).ready(function () {

    getAllContacts()
    /*$(document.body).on('click','.edit-contact', editContact)
    $(document.body).on('click','.star-contact', starContact)
    $(document.body).on('click','.delete-contact', deleteContact)*/

    $('.contactsFilter').on('changed.bs.select', filterContacts)



})

function getAllContacts() {

    obj = {
        filter:['agents']
    }

    callAjax('contacts', obj)
        .done(function (response) {
            console.log(response)
            var contacts = response.contacts;
            var categories = response.categories;
            var data = {}


            data.categories = categories;
            handlebarsRenderTemplate('#contactsFilterTemplate', '.contactsFilter', data)
            data.contacts=contacts;
            handlebarsRenderTemplate('#contactsGridTemplate', '#contactsGrid', data)
        }, function () {
            $('.contactsFilter').selectpicker('refresh')
            mixitup('#contactsGrid', {
            animation: {
                effects: 'fade rotateZ(-180deg)',
                duration: 500
            },
            classNames: {
                block: 'contactsFilter',
                elementFilter: 'myfilter'
            },
            selectors: {
                target: '.mix',
                control:'[data-mixitup-control]'
            }
        });

    });
}
function filterContacts(){
    var a = $(this).val();//Selection of user
    console.log(a)
    var options = [];
    $('.contactsFilter option').each(function(){
        options.push($(this).data('filter'));
    })
    console.log(options)

    /*
    * Get all elements with class mix, and check with data-filter
    *
    * */

    $elements = $('.mix');
    $.each($elements, function () {
        $at = $(this).data('filter')
        console.log(a)
        console.log($at)
        if($.inArray($at, a) === -1) console.log('nomatch')
        else console.log('not')
    })




/*

    $('.mix').each(function () {
        var element = $(this);
        if(element.is(options.join(', '))) console.log('found')
    });

*/





   /* $('.mix').each(function () {
       if(!$(this).is(a)) console.log('found!')
    })*/
}

function editContact() {
    $('#editContactModal').modal('open')
    callAjax('/contact/'+$(this).attr('data-edit'),{})
        .done(function (response) {
            console.log(response)
            var r = response
            var data = {
                contact: r
            };
            var a = handlebarsRenderTemplate('#editContactModalTemplate', data);
            console.log(a)
            $('#contactInfo').append(a)
            // Materialize.updateTextFields();



        })
}

function starContact() {
    console.log(this)

}
function deleteContact() {

}