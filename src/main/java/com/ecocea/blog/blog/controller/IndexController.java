package com.ecocea.blog.blog.controller;

import java.io.File;

import java.io.IOException;
import java.nio.file.Files;
import java.security.Principal;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.Set;

import com.ecocea.blog.blog.entity.User;
import com.ecocea.blog.blog.entity.Article;
import com.ecocea.blog.blog.entity.Category;
import com.ecocea.blog.blog.entity.Commentary;
import com.ecocea.blog.blog.service.CategoryService;
import com.ecocea.blog.blog.service.CommentaryService;
import com.ecocea.blog.blog.service.ArticleService;
import com.ecocea.blog.blog.service.UserService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.access.annotation.Secured;
import org.springframework.security.authentication.AnonymousAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.ui.ModelMap;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.ModelAndView;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;
import javax.validation.Valid;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.Calendar;
import java.util.Date;
import java.util.HashSet;



@Controller
public class IndexController {

	private static String upload_dir = "C://Project//blog//fileUpload";
	
    private static final DateFormat sdf = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
    private static final DateTimeFormatter dtf = DateTimeFormatter.ofPattern("yyyy/MM/dd HH:mm:ss");



	@Autowired
	private UserService userService;

	@Autowired
	private CategoryService categoryService;

	@Autowired
	private ArticleService articleService;
	
	@Autowired
	private CommentaryService commentaryService;
	
	@RequestMapping(value = { "/" }, method = RequestMethod.GET)
	public ModelAndView index() {
		ModelAndView modelAndView = new ModelAndView();
		Article article = new Article();
		Category category = new Category();
		modelAndView.addObject("article", article);
		modelAndView.addObject("category", category);
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.addObject("articles", articleService.ListAll());
		modelAndView.setViewName("index");
		return modelAndView;
	}

	@RequestMapping(value = { "/login" }, method = RequestMethod.GET)
	public ModelAndView login() {
		ModelAndView modelAndView = new ModelAndView();
		modelAndView.setViewName("login");
		return modelAndView;
	}

	@RequestMapping(value = { "/home", }, method = RequestMethod.GET)
	public ModelAndView return_home() {
		ModelAndView modelAndView = new ModelAndView();
		modelAndView.setViewName("index");
		return modelAndView;
	}

	@RequestMapping(value = "/registration", method = RequestMethod.GET)
	public ModelAndView registration() {
		ModelAndView modelAndView = new ModelAndView();
		User user = new User();
		modelAndView.addObject("user", user);
		modelAndView.setViewName("registration");
		return modelAndView;
	}

	@RequestMapping(value = "/registration", method = RequestMethod.POST)
	public ModelAndView createNewUser(@Valid User user, BindingResult bindingResult) {
		ModelAndView modelAndView = new ModelAndView();
		User userExists = userService.findUserByEmail(user.getEmail());
		if (userExists != null) {
			bindingResult.rejectValue("email", "error.user",
					"There is already a user registered with the email provided");
		}
		if (bindingResult.hasErrors()) {
			modelAndView.setViewName("registration");
		} else {
			new UserValidator().validate(user, bindingResult);
			if (bindingResult.hasErrors()) {
				modelAndView.setViewName("registration");
			} else {
				userService.saveUser(user);
				modelAndView.addObject("successMessage", "User has been registered successfully");
				modelAndView.addObject("user", new User());
				modelAndView.setViewName("registration");
			}
		}
		return modelAndView;
	}

	@RequestMapping(value = "/index", method = RequestMethod.GET)
	public ModelAndView home_index() {
		ModelAndView modelAndView = new ModelAndView();
		Authentication auth = SecurityContextHolder.getContext().getAuthentication();
		User user = userService.findUserByEmail(auth.getName());
		/*
		 * modelAndView.addObject("userName", "Welcome " + user.getName() + " " +
		 * user.getLastName() + " (" + user.getEmail() + ")");
		 * modelAndView.addObject("adminMessage",
		 * "Content Available Only for Users with Admin Role");
		 */
		Article article = new Article();
		Category category = new Category();
		modelAndView.addObject("article", article);
		modelAndView.addObject("category", category);
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.addObject("articles", articleService.ListAll());
		modelAndView.setViewName("/index");
		return modelAndView;
	}

	@RequestMapping(value = { "/admin/category" }, method = RequestMethod.GET)
	public ModelAndView moveCategory() {
		ModelAndView modelAndView = new ModelAndView();
		Category category = new Category();
		modelAndView.addObject("category", category);
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.setViewName("admin/category");
		return modelAndView;
	}

	@RequestMapping(value = "/registerCategory", method = RequestMethod.POST)
	public ModelAndView createNewCategory(@Valid Category category, BindingResult bindingResult) {
		ModelAndView modelAndView = new ModelAndView();
		Category categoryExist = categoryService.findCategoryByName(category.getName());
		if (categoryExist != null) {
			modelAndView.addObject("successMessage", "There is already a category registered with the name provided");
		}
		else if(category.getName().isEmpty())
		{
			modelAndView.addObject("successMessage", "Category has been registered successfully");

		}
		else {
			categoryService.saveCategory(category);
			modelAndView.addObject("successMessage", "Category has been registered successfully");

		}
			modelAndView.addObject("category", new Category());
			modelAndView.addObject("categories", categoryService.ListAll());
			modelAndView.setViewName("/admin/category");

		return modelAndView;
	}

	@RequestMapping(value = { "/admin/article" }, method = RequestMethod.GET)
	public ModelAndView moveArticle(Model model) {
		ModelAndView modelAndView = new ModelAndView();
		Article article = new Article();
		Category category = new Category();
		modelAndView.addObject("article", article);
		modelAndView.addObject("category", category);
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.setViewName("admin/article");

		return modelAndView;
	}

	@PostMapping("/registerArticle")

	public ModelAndView createArticle(@ModelAttribute Article article, @ModelAttribute Category category,
			Principal principal,BindingResult result, Model model) {

		ModelAndView modelAndView = new ModelAndView();

		Authentication auth = SecurityContextHolder.getContext().getAuthentication();
		User author = new User();
		author = userService.findUserByEmail(auth.getName());
		if(article.getText().isEmpty()){	
			modelAndView.addObject("successMessage", "Text is empty");

		}
		else if(article.getTitle().isEmpty()){	
			modelAndView.addObject("successMessage", "Title is empty");

		}
		else if(article.getTag().isEmpty()){	
			modelAndView.addObject("successMessage", "Tag is empty");

		}
		else if(article.getUrl().isEmpty()){	
			modelAndView.addObject("successMessage", "Url is empty");


		}else {
		article.setAuthor(author);
		article.setCategory(category);
		articleService.saveArticle(article);
		modelAndView.addObject("successMessage", "Article has been registered successfully");
		}
		modelAndView.addObject("category", category);
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.addObject("article", new Article());
		modelAndView.setViewName("/admin/article");
		return modelAndView;

	}

	@RequestMapping(value = { "/admin/article_list" }, method = RequestMethod.GET)
	public ModelAndView listArticle(Model model) {
		ModelAndView modelAndView = new ModelAndView();
		Article article = new Article();
		Category category = new Category();
		modelAndView.addObject("article", article);
		modelAndView.addObject("category", category);
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.addObject("articles", articleService.ListAll());
		modelAndView.setViewName("admin/article_list");

		return modelAndView;
	}

	@RequestMapping(value = "/modifArticle", method = RequestMethod.GET)
	public ModelAndView modifArticle(@ModelAttribute Article article, @ModelAttribute Category category,
			@RequestParam(value = "id") Long id, Model model) {

		ModelAndView modelAndView = new ModelAndView();
		modelAndView.addObject("article", article);
		modelAndView.addObject("category", category);
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.addObject("articles", articleService.findArticleById(id));
		modelAndView.setViewName("/admin/article_modif");
		return modelAndView;

	}

	@RequestMapping(value = "/deletefArticle", method = RequestMethod.GET)
	public ModelAndView deletefArticle(@ModelAttribute Article article, @ModelAttribute Category category,
			@RequestParam(value = "id") Long id, Model model) {

		ModelAndView modelAndView = new ModelAndView();
		articleService.deleteArticle(id);
		modelAndView.addObject("article", article);
		modelAndView.addObject("category", category);
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.addObject("articles", articleService.ListAll());
		modelAndView.addObject("successMessage", "Article has been deleted successfully");
		modelAndView.setViewName("/admin/article_list");
		return modelAndView;

	}

	@GetMapping("/registerArticle_modif")
	public ModelAndView upgradeArticle(@ModelAttribute Article articles, @ModelAttribute Category category,
			@RequestParam(value = "id", required = true, name = "id") Long id, Model model) {

		ModelAndView modelAndView = new ModelAndView();

		modelAndView.addObject("articles", articleService.findArticleById(id));
		Article articlefind = new Article();
		if(articles.getText().isEmpty()){	
			modelAndView.addObject("successMessage", "Text is empty");


		}
		else if(articles.getTitle().isEmpty()){	
			modelAndView.addObject("successMessage", "Title is empty");


		}
		else if(articles.getTag().isEmpty()){	
			modelAndView.addObject("successMessage", "Tag is empty");

		}
		else if(articles.getUrl().isEmpty()){	
			modelAndView.addObject("successMessage", "Url is empty");


		}else {
		articlefind = articleService.findArticleById(id);
		articlefind.setTitle(articles.getTitle());
		articlefind.setText(articles.getText());
		articlefind.setTag(articles.getTag());
		articlefind.setUrl(articles.getUrl());

		articleService.saveArticle(articlefind);

		modelAndView.addObject("successMessage", "Article has been update successfully");
		}
		
		modelAndView.addObject("articles", new Article());
		modelAndView.addObject("category", category);
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.addObject("articles", articleService.findArticleById(id));
		modelAndView.setViewName("/admin/article_modif");
		
		return modelAndView;

	}

	@RequestMapping(value = { "/admin/category_list" }, method = RequestMethod.GET)
	public ModelAndView listCategory(Model model) {
		ModelAndView modelAndView = new ModelAndView();
		Category category = new Category();
		modelAndView.addObject("category", category);
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.setViewName("admin/category_list");

		return modelAndView;
	}

	@RequestMapping(value = "/modifCategory", params = "Update", method = RequestMethod.GET)
	public ModelAndView modifCategory(@ModelAttribute Category category, @RequestParam(value = "id") Long id,
			Model model) {

		ModelAndView modelAndView = new ModelAndView();
		modelAndView.addObject("category", category);
		modelAndView.addObject("categories", categoryService.findCategoryById(id));
		modelAndView.addObject("categories_list", categoryService.ListAll());
		modelAndView.setViewName("/admin/category_modif");
		return modelAndView;

	}

	@RequestMapping(value = "/modifCategory", params = "Delete", method = RequestMethod.GET)
	public ModelAndView deleteCategory(@ModelAttribute Category category, @RequestParam(value = "id") Long id,
			Model model) {

		ModelAndView modelAndView = new ModelAndView();
		categoryService.deleteCategory(id);
		modelAndView.addObject("category", category);
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.addObject("successMessage", "Category has been deleted successfully");
		modelAndView.setViewName("/admin/Category_list");
		return modelAndView;

	}

	@GetMapping("/registerCategory_modif")
	public ModelAndView upgradeCategory(@ModelAttribute Category categories,
			@RequestParam(value = "id", required = true, name = "id") Long id, Model model) {

		ModelAndView modelAndView = new ModelAndView();
		Category categoryExist = categoryService.findCategoryByName(categories.getName());
		Category categoryfind = new Category();
		categoryfind = categoryService.findCategoryById(id);
		
		if (categoryExist != null) {
			modelAndView.addObject("successMessage", "There is already a category registered with the name provided");
		}
		else if(categories.getName().isEmpty())
		{
			modelAndView.addObject("successMessage", "Category is empty");

		}
		else {
			
		categoryfind.setName(categories.getName());
		categoryService.saveCategory(categoryfind);

		modelAndView.addObject("successMessage", "Category has been update successfully");
		}
		modelAndView.addObject("categories", new Category());
		modelAndView.addObject("categories_list", categoryService.ListAll());
		modelAndView.setViewName("/admin/category_modif");
		return modelAndView;

	}

	@RequestMapping(value = "/affifArticleIndex", method = RequestMethod.GET)
	public ModelAndView affiInfofArticle(@ModelAttribute Article article, @ModelAttribute Category category,@ModelAttribute Commentary comment,
			@RequestParam(value = "id") Long id, Model model) {

		ModelAndView modelAndView = new ModelAndView();
		modelAndView.addObject("article", article);
		modelAndView.addObject("category", category);
		modelAndView.addObject("comment", comment);
		modelAndView.addObject("comments", commentaryService.ListCommentaryByArticle_Id(id));
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.addObject("article", articleService.findArticleById(id));
		modelAndView.setViewName("/user/article_page_info");
		return modelAndView;

	}

	
	@RequestMapping(value = "/commentArticle", method = RequestMethod.GET)
	public ModelAndView commentArticle( @ModelAttribute Commentary Comment,@ModelAttribute Article article, @ModelAttribute Category category,
			@RequestParam("id") Long id,Model model) 
{

		ModelAndView modelAndView = new ModelAndView();
		Authentication auth = SecurityContextHolder.getContext().getAuthentication();
		User author = new User();
		author = userService.findUserByEmail(auth.getName());

		if(Comment.getDescription().isEmpty())
		{
			modelAndView.addObject("successMessage", "Commentary is empty");

		}
		else {
		Comment.setAuthor(author);
		Comment.setArticle(article);
		commentaryService.saveCommentary(Comment);		
		modelAndView.addObject("successMessage", "Commentary has been update successfully");
		}
		modelAndView.addObject("comment", new Commentary());
		modelAndView.addObject("article", article);
		modelAndView.addObject("category", category);
		modelAndView.addObject("comments", commentaryService.ListCommentaryByArticle_Id(id));
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.addObject("article", articleService.findArticleById(id));
		modelAndView.setViewName("/user/article_page_info");
		return modelAndView;

	}
	
	@RequestMapping(value = { "/afficheFilterCat" }, method = RequestMethod.GET)
	public ModelAndView afficheFilterCat(@ModelAttribute Article article,@ModelAttribute Category category,@RequestParam("filter_id") Long filter_id) {
		ModelAndView modelAndView = new ModelAndView();
		modelAndView.addObject("category", category);
		modelAndView.addObject("articles", articleService.ListArticleByCategory_Id(filter_id));
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.setViewName("/user/filter_category");
		return modelAndView;
	}
	
	@RequestMapping(value = { "/dashboard" }, method = RequestMethod.GET)
	public ModelAndView afficheDashboard(@ModelAttribute User user,@ModelAttribute Category category) {
		ModelAndView modelAndView = new ModelAndView();
		modelAndView.addObject("category", category);
		Authentication auth = SecurityContextHolder.getContext().getAuthentication();
		modelAndView.addObject("user", userService.findUserByEmail(auth.getName()));
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.setViewName("/user/dashboard");
		return modelAndView;
	}
	
	@RequestMapping(value = { "/goEditDashboard" },params= "ModifInfo", method = RequestMethod.GET)
	public ModelAndView goEditDashboard(@ModelAttribute User user,@ModelAttribute Category category) {
		ModelAndView modelAndView = new ModelAndView();
		modelAndView.addObject("category", category);
		Authentication auth = SecurityContextHolder.getContext().getAuthentication();
		modelAndView.addObject("userinfo", userService.findUserByEmail(auth.getName()));
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.setViewName("/user/edit_information");
		return modelAndView;
	}
	
	@RequestMapping(value = { "/editDashboard" }, method = RequestMethod.GET)
	public ModelAndView editInfoDashboard(@ModelAttribute User user,@ModelAttribute Category category) {
		ModelAndView modelAndView = new ModelAndView();
		Authentication auth = SecurityContextHolder.getContext().getAuthentication();

		User modifUser = new User();
		modifUser = userService.findUserByEmail(auth.getName());
		modifUser.setLastName(user.getLastName());
		modifUser.setName(user.getName());
		userService.updateUser(modifUser);
		
		modelAndView.addObject("user", userService.findUserByEmail(auth.getName()));
		modelAndView.addObject("category", category);
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.setViewName("/user/dashboard");
		return modelAndView;
	}
	
	@RequestMapping(value = { "/search" }, method = RequestMethod.GET)
	public ModelAndView searchByTitle(@ModelAttribute Article article ,@ModelAttribute Category category,@RequestParam("title_search") String title_search) {
		ModelAndView modelAndView = new ModelAndView();
		modelAndView.addObject("category", category);
		modelAndView.addObject("article", article);
		modelAndView.addObject("articles", articleService.ListArticleByTitleContainsOrTextContains(title_search,title_search));
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.setViewName("/user/search");
		return modelAndView;
	}
	
	@RequestMapping(value = { "/deleteComment" }, method = RequestMethod.GET)
	public ModelAndView searchByTitle(@ModelAttribute Article article ,@ModelAttribute Commentary comment ,@ModelAttribute Category category,@RequestParam("id_comment") long id_comment,
			@RequestParam("id") long id) {
		ModelAndView modelAndView = new ModelAndView();
		
		commentaryService.deleteCommentary(id_comment);

		modelAndView.addObject("article", article);
		modelAndView.addObject("category", category);
		modelAndView.addObject("comment", comment);
		modelAndView.addObject("comments", commentaryService.ListCommentaryByArticle_Id(id));
		modelAndView.addObject("categories", categoryService.ListAll());
		modelAndView.addObject("article", articleService.findArticleById(id));
		modelAndView.setViewName("/user/article_page_info");
		return modelAndView;
	}
	
	
}
