from tkinter import *
import mysql.connector
from tkinter import messagebox
from mysql.connector import Error

root = Tk()
root.title("Create Database and Table")
root.geometry("250x250")

def delete_database():
    try:
        conn = mysql.connector.connect(
            host="localhost",
            user="root",
            password=""
        )
        if conn.is_connected():
            mycursor = conn.cursor()
            myquery = "DROP DATABASE online_learning_system"
            mycursor.execute(myquery)
            messagebox.showinfo("Success", "Database 'Online Learning System' DROP successfully.")
    except Error as e:
        messagebox.showerror("Error", f"Error DROP database: {e}")
    finally:
        if 'mycursor' in locals():
            mycursor.close()
        if 'conn' in locals() and conn.is_connected():
            conn.close()

def create_database():
    try:
        conn = mysql.connector.connect(
            host="localhost",
            user="root",
            password=""
        )
        if conn.is_connected():
            mycursor = conn.cursor()
            myquery = "CREATE DATABASE IF NOT EXISTS online_learning_system"
            mycursor.execute(myquery)
            messagebox.showinfo("Success", "Database 'Online Learning System' created successfully.")
    except Error as e:
        messagebox.showerror("Error", f"Error creating database: {e}")
    finally:
        if 'mycursor' in locals():
            mycursor.close()
        if 'conn' in locals() and conn.is_connected():
            conn.close()

def create_table():
    try:
        conn = mysql.connector.connect(
            host="localhost",
            user="root",
            password="",
            database="online_learning_system"
        )
        if conn.is_connected():
            mycursor = conn.cursor()

            # First table creation query
            myquery1 = """
            CREATE TABLE IF NOT EXISTS users (
                user_id INT(100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
                name VARCHAR(100),
                email VARCHAR(100),
                age INT(100),
                password VARCHAR(100)
            );
            """
            mycursor.execute(myquery1)

            messagebox.showinfo("Success", "Tables 'Users' and 'namev' created successfully.")
    except Error as e:
        messagebox.showerror("Error", f"Error creating table: {e}")
    finally:
        if 'mycursor' in locals():
            mycursor.close()
        if 'conn' in locals() and conn.is_connected():
            conn.close()

dbbtn = Button(root, text="Create Database", command=create_database)
dbbtn.place(x=30, y=15, width=130)
dtblbel = Label(root, text="Step 1")
dtblbel.place(x=180, y=15)

tblebtn = Button(root, text="Create Table", command=create_table)
tblebtn.place(x=30, y=65, width=130)
tbllbel = Label(root, text="Step 2")
tbllbel.place(x=180, y=65)

mobbtn = Button(root, text="Delete Databse", command=delete_database)
mobbtn.place(x=30, y=115, width=130)
moblbel = Label(root, text="(Optional)")
moblbel.place(x=180, y=115)

root.mainloop()