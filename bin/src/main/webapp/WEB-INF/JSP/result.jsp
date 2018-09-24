<%@page contentType = "text/html;charset = UTF-8" language = "java" %>
<%@page isELIgnored = "false" %>
<%@taglib uri = "http://www.springframework.org/tags/form" prefix = "form"%>
<html>
<head>
    <title>Spring MVC Form Handling</title>
</head>

<body>
<h2>Submitted Student Information</h2>
<table>
    <tr>
        <td>Name</td>
        <td>${fullName}</td>
    </tr>
    <tr>
        <td>FirstNzme</td>
        <td>${firstName}</td>
    </tr>
    <tr>
    <tr>
        <td>Pseudo</td>
        <td>${pseudo}</td>
    </tr>
        <td>Adresse mail</td>
        <td>${addMail}</td>
    </tr>
</table>
</body>

</html>