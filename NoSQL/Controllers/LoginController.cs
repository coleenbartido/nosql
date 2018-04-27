using MongoDB.Bson;
using MongoDB.Driver.Builders;
using NoSQL.App_Start;
using NoSQL.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace NoSQL.Controllers
{
    public class LoginController : Controller
    {

        MongoContext _dbContext;

        public LoginController()
        {
            _dbContext = new MongoContext();
        }

        // GET: Login
        public ActionResult HomeLogin()
        {
            return View();
        }

        
        public ActionResult ValidateLogin(UserAccount user)
        {
            var document = _dbContext._database.GetCollection<BsonDocument>("UserAccount");
            var query = Query.And(Query.EQ("Email", user.Email), Query.EQ("Password", user.Password));
            
            var count = document.FindAs<UserAccount>(query).Count();
            if (count == 0)
            {
                TempData["Message"] = "User does not exist";
                return View("HomeLogin", user);
            }
            else
            {

                return RedirectToAction("HomePage", "Home");
            }
            
        }
        
        // GET: Login/Details/5
        public ActionResult Details(int id)
        {
            return View();
        }

        // GET: Login/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: Login/Create
        [HttpPost]
        public ActionResult Create(FormCollection collection)
        {
            try
            {
                // TODO: Add insert logic here

                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }

        // GET: Login/Edit/5
        public ActionResult Edit(int id)
        {
            return View();
        }

        // POST: Login/Edit/5
        [HttpPost]
        public ActionResult Edit(int id, FormCollection collection)
        {
            try
            {
                // TODO: Add update logic here

                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }

        // GET: Login/Delete/5
        public ActionResult Delete(int id)
        {
            return View();
        }

        // POST: Login/Delete/5
        [HttpPost]
        public ActionResult Delete(int id, FormCollection collection)
        {
            try
            {
                // TODO: Add delete logic here

                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }
    }
}
