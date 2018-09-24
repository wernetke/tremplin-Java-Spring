package com.ecocea.blog.blog.service;

import java.util.ArrayList;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.ecocea.blog.blog.entity.Article;
import com.ecocea.blog.blog.entity.Category;
import com.ecocea.blog.blog.entity.Commentary;
import com.ecocea.blog.blog.repository.CommentaryRepository;


@Service("commentaryService")

public class CommentaryServiceImpl implements CommentaryService {

	
	@Autowired
	private CommentaryRepository commentaryRepository;
	
	@Override
	public void saveCommentary(Commentary commentary) {
		commentaryRepository.save(commentary);
	}
	
	@Override
	public java.util.List<Commentary> ListCommentaryByArticle_Id(Long id){
		java.util.List<Commentary> commentary = new ArrayList<>();
		commentaryRepository.findByArticle_Id(id).forEach(e -> commentary.add(e));
		return commentary;
	}
	@Override
	public Commentary findCommentaryById(Long id)
	{
		return commentaryRepository.findById(id);

	}
	
	@Override
	public void deleteCommentary(Long commentId)
	{
		commentaryRepository.delete(findCommentaryById(commentId));

	}

}
