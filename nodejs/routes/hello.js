const express = require("express");
const status = require("http-status");
const router = express.Router();

router.get("/", function (req, res)
{
	res.send("Hello, World!");
});
router.post("/", function (req, res)
{
	res.sendStatus(status.METHOD_NOT_ALLOWED);
});
module.exports = router;
