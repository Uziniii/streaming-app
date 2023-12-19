import express from "express";
import { QBittorrent } from "@ctrl/qbittorrent"
import path from "path"

const __dirname = path.resolve(path.dirname(""));

const client = new QBittorrent({
  baseUrl: 'http://localhost:8080/',
  username: 'admin',
  password: 'password',
});

const app = express();

app.use(express.json());

app.post("/download", async function (req, res) {
  let magnet = req.body.magnet;
  
  try {
    await client.addMagnet(magnet, {
      savepath: path.join(__dirname, "..", "public", "movies"),
      sequentialDownload: true,
    });
    
    res.sendStatus(200)
  } catch (e) {
    res.sendStatus(400)
  }
})

app.get("/status", async function (req, res) {
  const torrent = await client.listTorrents();

  res.send(torrent)
})

app.listen(4000, () => console.log("server started"))
