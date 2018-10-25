package com.ecocea.blog.blog.entity;

import javax.persistence.*;

import java.time.LocalDateTime;
import java.util.Collection;
import java.util.Date;

import org.hibernate.annotations.CreationTimestamp;



@Entity
@Table(name = "Commentary")
public class Commentary {
    @Id
    @GeneratedValue
    @Column(name = "id", nullable = false)
    private Long id;

    @Column(name="description", length=255, nullable = false)
    private String description;


   
	@CreationTimestamp
	private LocalDateTime creationDate;
	
	@ManyToOne
	private Article article;
	
    public Article getArticle() {
		return article;
	}

	public void setArticle(Article article) {
		this.article = article;
	}

	@ManyToOne
	private User author;
	
	public User getAuthor() {
		return author;
	}

	public void setAuthor(User author) {
		this.author = author;
	}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getDescription() {
		return description;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public LocalDateTime getCreationDate() {
		return creationDate;
	}

	public void setCreationDate(LocalDateTime creationDate) {
		this.creationDate = creationDate;
	}
 
	

	


    
}
