package com.ecocea.blog.blog.repository;

import java.util.List;
import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.ecocea.blog.blog.entity.Article;
import com.ecocea.blog.blog.entity.Category;
import com.ecocea.blog.blog.entity.Commentary;

@Repository("commentaryRepository")

public interface CommentaryRepository extends JpaRepository<Commentary, String>{

	void save(Optional<Commentary> commentary);
	Commentary findById(Long id);
	List<Commentary> findByArticle_Id(Long id);


}
