package com.ecocea.blog.blog.service;


import com.ecocea.blog.blog.entity.Commentary;

public interface CommentaryService {
	
	public void saveCommentary(Commentary commentary);
	public java.util.List<Commentary> ListCommentaryByArticle_Id(Long id);
	public Commentary findCommentaryById(Long id);
	public void deleteCommentary(Long commentId);



}
