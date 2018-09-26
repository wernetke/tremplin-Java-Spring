<!DOCTYPE html>
<%@ taglib prefix="spring" uri="http://www.springframework.org/tags"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<html lang="en">
<head>

    <!-- Access the bootstrap Css like this,
        Spring boot will handle the resource mapping automcatically -->
    <link rel="stylesheet" type="text/css" href="webjars/bootstrap/3.3.7/css/bootstrap.min.css" />


	<spring:url value="/css/main.css" var="springCss" />
	<link href="${springCss}" rel="stylesheet" />

   <%-- <c:url value="/css/main.css" var="jstlCss" />--%>
    <link href="${jstlCss}" rel="stylesheet" />

</head>
<body>
<div class="container">
    <header>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
            <img src="" alt=""/>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!--<li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>!-->
                </ul>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
            <a href="#connexion">
                <span class="glyphicon glyphicon-user"></span>
            </a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form:form method="post" action="/index/addRegistration" modelAttribute="registration">

                            <form:label path="fullName">Nom d'utilisateur <span class="requis">*</span></form:label>
                            <form:input path="fullName" type="text" id="fullName" name="fullName" value="" size="20" maxlength="60" />
                            <br />

                            <form:label path="firstName">Prénom <span class="requis">*</span></form:label>
                            <form:input path="firstName" type="text" id="firstName" name="firstName" value="" size="20" maxlength="60" />
                            <br />

                            <form:label path="pseudo">Prénom <span class="requis">*</span></form:label>
                            <form:input path="pseudo" type="text" id="pseudo" name="pseudo" value="" size="20" maxlength="60" />
                            <br />

                            <form:label path="add_mail">Adresse email <span class="requis">*</span></form:label>
                            <form:input path="name" type="text" id="email" name="email" value="" size="20" maxlength="60" />
                            <br />

                            <form:label path="mdp">Mot de passe <span class="requis">*</span></form:label>
                            <form:input path="mdp" type="password" id="motdepasse" name="motdepasse" value="" size="20" maxlength="20" />
                            <br />

                            <form:label path="mdp">Confirmation du mot de passe <span class="requis">*</span></form:label>
                            <form:input path="mdp" type="password" name="motdepasse" value="" size="20" maxlength="20" />
                            <br />

                        </form:form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>




    </header>
</div>




</body>
</html>