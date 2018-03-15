package com.internousdev.ecsite.action;

import java.util.ArrayList;
import java.util.Map;

import org.apache.struts2.interceptor.SessionAware;

import com.internousdev.ecsite.dao.BuyItemDAO;
import com.internousdev.ecsite.dto.BuyItemDTO;
import com.opensymphony.xwork2.ActionSupport;

public class HomeAction extends ActionSupport implements SessionAware{
	public Map<String,Object>session;
	public ArrayList<BuyItemDTO> buyItemList = new ArrayList<BuyItemDTO>();
	public String execute(){
		BuyItemDAO buyItemDAO = new BuyItemDAO();
		String result = "login";
		if(session.containsKey("id")){
			buyItemList = buyItemDAO.getBuyItemInfo();
			session.put("itemList", buyItemList);
			result = SUCCESS;
		}
		return result;
	}

	@Override
	public void setSession(Map<String,Object> session){
		this.session = session;
	}

	public Map<String,Object> getSession(){
		return this.session;
	}

}
