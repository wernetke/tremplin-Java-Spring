package com.ecocea.blog.blog.service;


import java.util.ArrayList;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.ecocea.blog.blog.entity.Category;
import com.ecocea.blog.blog.repository.CategoryRepository;


@Service("categoryService")

public class CategoryServiceImpl implements CategoryService{
	
	@Autowired
	private CategoryRepository categoryRepository;
	
	@Override
	public Category findCategoryByName(String name) {
		return categoryRepository.findByName(name);
	}
	
	@Override
	public Category findCategoryById(Long id)
	{
		return categoryRepository.findById(id);

	}
	@Override
	public void saveCategory(Category category) {
		categoryRepository.save(category);
	}
	
	@Override
	public void deleteCategory(Long categoryId)
	{
		categoryRepository.delete(findCategoryById(categoryId));

	}
	
	@Override
	public java.util.List<Category> ListAll() {
		java.util.List<Category> category = new ArrayList<>();
		categoryRepository.findAll().forEach(e -> category.add(e));
		return category;
	}
}
