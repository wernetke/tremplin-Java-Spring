package com.ecocea.blog.blog.repository;

import java.util.List;
import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.ecocea.blog.blog.entity.Article;
import com.ecocea.blog.blog.entity.Category;
import com.ecocea.blog.blog.entity.Commentary;

@Repository("articleRepository")

public interface ArticleRepository extends JpaRepository<Article, String>{
	Article findByCategory(Category category);
	Article findById(Long id);
	List<Article> findAll();
	List<Article> findByCategory_Id(Long id);
	List<Article> findByTag(String tag);
	List<Article> findByTitle(String title);
	List<Article> findByTitleContainsOrTextContains(String title, String text);




}
