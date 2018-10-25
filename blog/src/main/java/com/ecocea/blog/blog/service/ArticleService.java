package com.ecocea.blog.blog.service;

import java.util.Optional;

import com.ecocea.blog.blog.entity.Article;
import com.ecocea.blog.blog.entity.Category;


public interface ArticleService {
	
	public void saveArticle(Article article);
	public Article findArticleById(Long id);
	public java.util.List<Article> ListAll();
	public void deleteArticle(Long articleId);
	public java.util.List<Article> ListArticleByCategory_Id(Long id);
	public java.util.List<Article> ListArticleByTag(String tag);
	public java.util.List<Article> ListArticleTitle(String name);
	public java.util.List<Article> ListArticleByTitleContainsOrTextContains(String title, String text);



}
