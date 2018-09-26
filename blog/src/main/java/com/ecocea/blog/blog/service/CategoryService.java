package com.ecocea.blog.blog.service;

import com.ecocea.blog.blog.entity.Category;

import antlr.collections.List;

public interface CategoryService {
	public Category findCategoryByName(String name);
	public Category findCategoryById(Long id);
	public void deleteCategory(Long categoryId);

	public void saveCategory(Category category);
	public java.util.List<Category> ListAll();

}
