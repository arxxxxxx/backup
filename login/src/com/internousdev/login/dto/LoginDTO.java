package com.internousdev.login.dto;

public class LoginDTO {
	// テーブルカラムに対応したフィールド変数を宣言します。
	private int id;
	private String name;
	private String password;

	// フィールド変数に対応したGetter、Setterを定義します。
	public int getId(){
		return id;
	}

	public void setId(int id){
		this.id = id;
	}

	public String getName(){
		return name;
	}

	public void setName(String name){
		this.name = name;
	}

	public String getPassword(){
		return password;
	}

	public void setPassword(String password){
		this.password = password;
	}
}
