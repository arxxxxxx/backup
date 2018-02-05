package com.internousdev.login.dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import com.internousdev.login.dto.LoginDTO;
import com.internousdev.login.util.DBConnector;

public class LoginDAO {
	public LoginDTO select(String name, String password) throws SQLException {
		System.out.println(name+password);
		LoginDTO dto = new LoginDTO();
		DBConnector db = new DBConnector();
		Connection con = db.getConnection();
		String sql = "select * from user where user_name=? and password=?";

		try {
			// セキュリティ対策を考慮してJavaではPreparedStatementを利用します。
			PreparedStatement ps = con.prepareStatement(sql);

			// SQL文の「？」パラメータに指定した値を挿入することができます。
			ps.setString(1, name);
			ps.setString(2, password);

			// sql文を実行します。
			ResultSet rs = ps.executeQuery();

			if (rs.next()) {
				// Select文でDBから取得した情報をDTOクラスに格納します。
				dto.setName(rs.getString("user_name"));
				dto.setPassword(rs.getString("password"));
				System.out.println(rs.getString("password"));
			}
		} catch (SQLException e) {
			// 処理中にSQL関連のエラーが発生した際に実行する処理です。
			e.printStackTrace();
		} finally {
			// 必ず実行する処理です。DB接続を切断します。
			con.close();
		}
		return dto;
	}
}
