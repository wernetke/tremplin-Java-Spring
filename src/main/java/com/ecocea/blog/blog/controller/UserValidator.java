package com.ecocea.blog.blog.controller;

import org.springframework.validation.Errors;
import org.springframework.validation.ValidationUtils;
import org.springframework.validation.Validator;
import com.ecocea.blog.blog.entity.User;
import java.util.regex.Pattern;

public class UserValidator implements Validator {
	private static final Pattern EMAIL_REGEX =
            Pattern.compile("^[\\w\\d._-]+@[\\w\\d.-]+\\.[\\w\\d]{2,6}$");
	private static final Pattern MDP_REGEX =
			Pattern.compile("^(?=.*[a-zA-Z])(?=.*[0-9]).{8,24}$");

    @Override
    public boolean supports(Class<?> clazz) {
        return clazz == User.class;
    }

    @Override
    public void validate(Object target, Errors errors) {
        ValidationUtils.rejectIfEmpty(errors, "pseudo", "user.pseudo.empty");
        ValidationUtils.rejectIfEmpty(errors, "password", "user.password.empty");
        ValidationUtils.rejectIfEmpty(errors, "email", "user.email.empty");

        User user = (User) target;
        if (user.getPseudo() != null && user.getPseudo().length() < 3 ||
                user.getPseudo().length() > 15) {
            errors.rejectValue("pseudo", "user.pseudo.size");
        }

        if (user.getPassword() != null && user.getPassword().contains(" ")) {
            errors.rejectValue("password", "user.password.space");
        }

        if (user.getPassword() != null && user.getPassword().length() < 8 &&
                user.getPassword().length() > 24) {
            errors.rejectValue("password", "user.password.size");
        }

        if (user.getEmail() != null && !EMAIL_REGEX.matcher(user.getEmail()).matches()) {
            errors.rejectValue("email", "user.email.invalid");
        }
        
        if (user.getPassword() != null && !MDP_REGEX.matcher(user.getPassword()).matches()) {
            errors.rejectValue("password", "user.password.invalid");
        }
    }
}
