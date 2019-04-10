using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Tinders
{
    #region Login
    public class Login
    {
        #region Member Variables
        protected int _id;
        protected string _username;
        protected string _password;
        #endregion
        #region Constructors
        public Login() { }
        public Login(string username, string password)
        {
            this._username=username;
            this._password=password;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        #endregion
    }
    #endregion
}