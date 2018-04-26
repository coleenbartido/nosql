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
    public class UserAccountController : Controller
    {
        MongoContext _dbContext;
        // GET: UserAccount

        public UserAccountController()
        {
            _dbContext = new MongoContext();
        }
        public ActionResult Index()
        {

            return View();
        }

        // GET: UserAccount/Details/5
        public ActionResult Details(int id)
        {
            return View();
        }
        
        // GET: UserAccount/Create
        public ActionResult Create()
        {
            return View();
        }

        [HttpPost]
        public ActionResult AddUser(UserAccount user)
        {
            try
            {
                var document = _dbContext._database.GetCollection<BsonDocument>("UserAccount");
                var query = Query.And(Query.EQ("Email", user.Email));

                var count = document.FindAs<UserAccount>(query).Count();
                if (count == 0)
                {
                    var result = document.Insert(user);
                }
                else
                {
                    TempData["Message"] = "User already exists";
                    return View("Create", user);
                }

                return RedirectToAction("Index");
            }
            catch
            {
                return RedirectToAction("Create");
            }

            
        }

        // POST: UserAccount/Create
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

        // GET: UserAccount/Edit/5
        public ActionResult Edit(int id)
        {
            return View();
        }

        // POST: UserAccount/Edit/5
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

        // GET: UserAccount/Delete/5
        public ActionResult Delete(int id)
        {
            return View();
        }

        // POST: UserAccount/Delete/5
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
