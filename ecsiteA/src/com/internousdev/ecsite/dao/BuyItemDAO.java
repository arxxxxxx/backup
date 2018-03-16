package com.internousdev.ecsite.dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

import com.internousdev.ecsite.dto.BuyItemDTO;
import com.internousdev.ecsite.util.DBConnector;

public class BuyItemDAO {
	private DBConnector dbConnector = new DBConnector();
	private Connection connection = dbConnector.getConnection();
	private ArrayList<BuyItemDTO> buyItemDTOList = new ArrayList<BuyItemDTO>();

	public ArrayList<BuyItemDTO> getBuyItemInfo(){
		String sql = "SELECT id,item_name,item_price FROM item_info_transaction";

		try{
			PreparedStatement preparedStatement = connection.prepareStatement(sql);
			ResultSet resultSet = preparedStatement.executeQuery();
			while(resultSet.next()){
				BuyItemDTO buyItemDTO = new BuyItemDTO();
				buyItemDTO.setId(resultSet.getInt("id"));
				buyItemDTO.setItemName(resultSet.getString("item_name"));
				buyItemDTO.setItemPrice(resultSet.getString("item_price"));
				buyItemDTOList.add(buyItemDTO);
			}
		}catch(Exception e){
			e.printStackTrace();
		}
		return buyItemDTOList;
	}

	public BuyItemDTO select(int id){
		String sql = "SELECT id,item_name,item_price FROM item_info_transaction WHERE id=?";
		BuyItemDTO buyItemDTO = new BuyItemDTO();

		try{
			PreparedStatement preparedStatement = connection.prepareStatement(sql);
			preparedStatement.setInt(1,id);
			ResultSet resultSet = preparedStatement.executeQuery();
			if(resultSet.next()){
				buyItemDTO.setId(resultSet.getInt("id"));
				buyItemDTO.setItemName(resultSet.getString("item_name"));
				buyItemDTO.setItemPrice(resultSet.getString("item_price"));
			}
		}catch(Exception e){
			e.printStackTrace();
		}
		return buyItemDTO;
	}
}