package com.internousdev.ecsite.action;

import java.util.List;
import java.util.Map;

import org.apache.struts2.interceptor.SessionAware;

import com.internousdev.ecsite.dao.BuyItemDAO;
import com.internousdev.ecsite.dao.LoginDAO;
import com.internousdev.ecsite.dto.BuyItemDTO;
import com.internousdev.ecsite.dto.LoginDTO;
import com.opensymphony.xwork2.ActionSupport;

public class LoginAction extends ActionSupport implements SessionAware{

	/**
	 * ログインID
	 */
	private String loginUserId;

	/**
	 * ログインパスワード
	 */
	private String loginPassword;

	/**
	 * ログイン情報を格納
	 */
	public Map<String,Object>session;

	/**
	 * ログイン情報を取得DAO
	 */
	private LoginDAO loginDAO = new LoginDAO();

	/**
	 * ログイン情報を格納DTO
	 */
	private LoginDTO loginDTO = new LoginDTO();

	/**
	 * アイテム情報を取得
	 */
	private BuyItemDAO buyItemDAO = new BuyItemDAO();

	/**
	 * 実行メソッド
	 */
	public String execute(){
		String result = ERROR;

		// ログイン実行
		loginDTO = loginDAO.getLoginUserInfo(loginUserId,loginPassword);
		session.put("loginUser", loginDTO);
		session.put("login_id",loginDTO.getLoginId());

		// ログイン情報を比較
		if(((LoginDTO)session.get("loginUser")).getLoginFlg()){
			result = SUCCESS;
			List<BuyItemDTO> buyItemDTOList = buyItemDAO.getBuyItemInfo();

			session.put("buyItemDTOList",buyItemDTOList);

			return result;
		}
		return result;
	}

	public String getLoginUserId(){
		return loginUserId;
	}

	public void setLoginUserId(String loginUserId){
		this.loginUserId = loginUserId;
	}

	public String getLoginPassword(){
		return loginPassword;
	}

	public void setLoginPassword(String loginPassword){
		this.loginPassword = loginPassword;
	}
	@Override
	public void setSession(Map<String,Object>session){
		this.session = session;
	}

}