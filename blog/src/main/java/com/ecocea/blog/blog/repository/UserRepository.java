package com.ecocea.blog.blog.repository;


import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.ecocea.blog.blog.entity.Category;
import com.ecocea.blog.blog.entity.User;

@Repository("userRepository")

public interface UserRepository extends JpaRepository<User , String> {
	User findByEmail(String addMail);
}
