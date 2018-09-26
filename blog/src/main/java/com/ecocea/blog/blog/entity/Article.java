package com.ecocea.blog.blog.entity;

import javax.persistence.*;

import org.springframework.web.multipart.MultipartFile;


import java.util.ArrayList;
import java.util.Collection;
import java.util.List;
import java.util.Set;

@Entity
@Table(name = "Article")
public class Article {

    @Id
    @GeneratedValue
    @Column(name = "id", nullable = false)
    private Long id;

    @Column(name="Title", length=255, nullable = false)
    private String title;

    @Column(name="url", length=255, nullable = false)
    private String url;
    

	@Column(name="text", length=255, nullable = false)
    private String text;

    @Column(name="tag", length=255, nullable = false)
    private String tag;
    
    @ManyToOne
    private User author;


	@ManyToOne
    private Category category;

	public User getAuthor() {
		return author;
	}

	public void setAuthor(User author) {
		this.author = author;
	}

	public String getUrl() {
		return url;
	}

	public void setUrl(String url) {
		this.url = url;
	}
	
	public Category getCategory() {
		return category;
	}
	
	
	public void setCategory(Category category) {
		this.category = category;
	}

	

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getTitle() {
		return title;
	}

	public void setTitle(String title) {
		this.title = title;
	}

	

	public String getText() {
		return text;
	}

	public void setText(String text) {
		this.text = text;
	}

	public String getTag() {
		return tag;
	}

	public void setTag(String tag) {
		this.tag = tag;
	}


	


    

}
