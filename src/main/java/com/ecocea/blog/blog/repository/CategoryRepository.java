package com.ecocea.blog.blog.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.ecocea.blog.blog.entity.Category;

@Repository("categoryRepository")

public interface CategoryRepository extends JpaRepository<Category, String>{
	Category findByName(String name);
	Category findById(Long id);

	List<Category> findAll();
	

}

