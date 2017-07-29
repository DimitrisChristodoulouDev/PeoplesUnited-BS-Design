$(function () {
    //Render templates
    // renderTemplates()
    // addHoverClass()
    //TODO: automaticLogout()
});

function addHoverClass() {
    $('.card').removeClass('hoverable').addClass('hoverable');
}

function saveToken(token) {
    localStorage.setItem('AuthToken', token);
}

function getToken() {
    return localStorage.getItem('AuthToken');
}

function removeToken() {
    localStorage.removeItem('AuthToken');
}

function automaticLogout() {
    if (!getToken() && window.location.pathname != '/user-login.html') {
        $(document).idleTimeout({
            redirectUrl: 'user-login.html', // redirect to this url. Set this value to YOUR site's logout page.
            idleTimeLimit: 10, // 15 seconds
            activityEvents: 'click keypress scroll wheel mousewheel', // separate each event with a space
            enableDialog: false,
            customCallback: notification(['Logging out']),
            idleCheckHeartbeat: 5
        });
    }
}

//TODO: Load external handlebars template file
function renderTemplates() {
    var templatesFolder = 'html/templates/'
    var toLoad = {
        footer: {
            url: templatesFolder + 'footer.htm',
            selector: '#footer'
        },
        header: {
            url: templatesFolder + 'header.htm',
            selector: '#headerContainer'
        },
        breadcrumbs: {
            url: templatesFolder + 'breadcrumbs.htm',
            selector: '#breadcrumbs'
        }
    }
    $.each(toLoad, loadPartials)
}

function handlebarsRenderTemplate(selector, container, context) {
    var theTemplateScript = $(selector).html();

    // Compile the template
    var theTemplate = Handlebars.compile(theTemplateScript);

    // Pass our data to the template

    var theCompiledHtml = theTemplate(context);
    $(container).append(theCompiledHtml)
}


function callAjax(url, data) {
    base_url = 'http://api/';
    return $.ajax({
        async: true,
        crossDomain: true,
        method: 'POST',
        headers: {
            AuthToken: getToken(),
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        cache: true,
        url: base_url + url,
        dataType: 'json',
        data: data,
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log('Error: ', errorThrown, 'Status', textStatus);
            console.log('An error has occured. Reload your browser')
        },
        success: function (response) {
            console.log('Success', response);
        }
    });
}

function readForm(selector) {
    return $(selector).serializeArray();
}


function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}


/*

function sweetAlert(msg){
    var sweetAlert = {
        primary    : function () {
            return swal('Note', msg, 'primary')
        },
        info      : "Error...",
        danger    : "Success!",
        success    : "Success!",
        warning    : "Success!"
    }
    return sweetAlert;
}
*/


