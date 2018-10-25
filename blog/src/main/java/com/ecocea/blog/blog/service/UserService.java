package com.ecocea.blog.blog.service;

import com.ecocea.blog.blog.entity.User;

public interface UserService {
	public User findUserByEmail(String addMail);
	public void saveUser(User user);
	public void updateUser(User user);
	public User findByConfirmationToken(String confirmationToken);
}
