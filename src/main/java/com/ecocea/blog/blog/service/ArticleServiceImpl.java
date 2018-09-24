package com.ecocea.blog.blog.service;

import com.ecocea.blog.blog.repository.ArticleRepository;
import com.ecocea.blog.blog.repository.CategoryRepository;

import java.util.ArrayList;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.ecocea.blog.blog.entity.Article;
import com.ecocea.blog.blog.entity.Category;
import com.ecocea.blog.blog.entity.Commentary;

@Service("articleService")

public class ArticleServiceImpl implements ArticleService{
	@Autowired
	private ArticleRepository articleRepository;
	
	@Override
	public void saveArticle(Article article) {
		articleRepository.save(article);
	}
	
	@Override
	public void deleteArticle(Long articleId) {
		articleRepository.delete(findArticleById(articleId));
	}
	
	@Override
	public java.util.List<Article> ListAll() {
		java.util.List<Article> article = new ArrayList<>();
		articleRepository.findAll().forEach(e -> article.add(e));
		return article;
	}
	@Override	
	public java.util.List<Article> ListArticleByCategory_Id(Long id){
		java.util.List<Article> article = new ArrayList<>();
		articleRepository.findByCategory_Id(id).forEach(e -> article.add(e));
		return article;
	}

	
	@Override
	public Article findArticleById(Long id)
	{
		return articleRepository.findById(id);
	}
	
	@Override
	public java.util.List<Article> ListArticleTitle(String name){
		java.util.List<Article> article = new ArrayList<>();
		articleRepository.findByTitle(name).forEach(e -> article.add(e));
		return article;
	}
	
	@Override
	public java.util.List<Article> ListArticleByTitleContainsOrTextContains(String title, String text)
	{
		java.util.List<Article> article = new ArrayList<>();
		articleRepository.findByTitleContainsOrTextContains(title,text).forEach(e -> article.add(e));
		return article;
	}

	
	
}
