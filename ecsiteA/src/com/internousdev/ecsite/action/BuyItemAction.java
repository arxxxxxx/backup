package com.internousdev.ecsite.action;

import java.util.Map;

import org.apache.struts2.interceptor.SessionAware;

import com.internousdev.ecsite.dao.BuyItemDAO;
import com.internousdev.ecsite.dto.BuyItemDTO;
import com.opensymphony.xwork2.ActionSupport;

public class BuyItemAction extends ActionSupport implements SessionAware{


	private int id;

	private BuyItemDAO dao = new BuyItemDAO();

	private BuyItemDTO dto = new BuyItemDTO();

	/**
	 * アイテム情報を格納
	 */
	public Map<String,Object> session;

	/**
	 * 商品情報取得メソッド
	 *
	 * @author internous
	 */
	public String execute(){
		dto = dao.select(id);
		session.put("id", dto.getId());
		session.put("item_name", dto.getItemName());
		session.put("buyItem_price", dto.getItemPrice());

		return SUCCESS;
	}

	@Override
	public void setSession(Map<String,Object>session){
		this.session = session;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

}
