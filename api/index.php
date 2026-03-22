<?php
/**
 * Francis Kialo Mwendwa — Portfolio
 * Pure PHP, zero-dependency entry point for Vercel.
 */

$p = require dirname(__DIR__) . '/config/profile.php';

$name    = htmlspecialchars($p['name']);
$email   = htmlspecialchars($p['email']);
$phone   = htmlspecialchars($p['phone']);
$year    = date('Y');

function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Francis Kialo Mwendwa — Nairobi-based Web Developer, IT Professional & Academic Writer. Available on Fiverr, Upwork & LinkedIn.">
<title><?= $name ?> — Web Developer &amp; Academic Writer</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --bg:#04060f;--surface:#080d1a;--card:#0c1220;--card2:#0f1828;
  --border:#161f33;--border2:#1e2d47;--text:#e8edf5;--subtle:#7c88a0;
  --muted:#404e66;--accent:#6366f1;--indigo:#818cf8;--purple:#a78bfa;
  --cyan:#22d3ee;--green:#10b981;--r:16px;
}
html{scroll-behavior:smooth}
body{font-family:'Plus Jakarta Sans',-apple-system,sans-serif;background:var(--bg);color:var(--text);line-height:1.7;overflow-x:hidden}
#glow{position:fixed;width:600px;height:600px;border-radius:50%;background:radial-gradient(circle,rgba(99,102,241,.055) 0%,transparent 70%);pointer-events:none;transform:translate(-50%,-50%);z-index:0;transition:left .15s,top .15s}
/* NAV */
.nav-wrap{position:fixed;top:.9rem;left:0;right:0;z-index:500;display:flex;justify-content:center;padding:0 1rem}
nav{display:flex;align-items:center;gap:1.75rem;padding:.6rem 1.6rem;background:rgba(8,13,26,.82);backdrop-filter:blur(24px);border:1px solid var(--border2);border-radius:999px;flex-wrap:wrap;justify-content:center}
nav a{color:var(--subtle);text-decoration:none;font-size:.8rem;font-weight:600;letter-spacing:.3px;transition:color .2s;white-space:nowrap}
nav a:hover{color:var(--indigo)}
.nav-cta{background:linear-gradient(135deg,var(--accent),#4f46e5)!important;color:#fff!important;padding:.42rem 1.15rem!important;border-radius:999px}
/* HERO */
.hero{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:7rem 1.5rem 5rem;position:relative;overflow:hidden}
.hero::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 80% 60% at 20% 10%,rgba(99,102,241,.1) 0%,transparent 55%),radial-gradient(ellipse 60% 50% at 80% 80%,rgba(167,139,250,.07) 0%,transparent 55%);pointer-events:none}
.orb{position:absolute;border-radius:50%;filter:blur(100px);pointer-events:none;animation:orbDrift 16s ease-in-out infinite alternate}
.o1{width:min(50vw,560px);height:min(50vw,560px);background:rgba(99,102,241,.09);top:-10%;left:-10%}
.o2{width:min(40vw,440px);height:min(40vw,440px);background:rgba(167,139,250,.07);bottom:-8%;right:-8%;animation-delay:-8s}
@keyframes orbDrift{from{transform:translate(0,0) scale(1)}to{transform:translate(20px,-20px) scale(1.06)}}
.hero-inner{position:relative;z-index:1;display:grid;grid-template-columns:1fr 340px;gap:4.5rem;align-items:center;max-width:1120px;width:100%}
.badge{display:inline-flex;align-items:center;gap:.45rem;background:rgba(16,185,129,.07);border:1px solid rgba(16,185,129,.22);color:var(--green);font-size:.75rem;font-weight:700;padding:.38rem 1rem;border-radius:999px;margin-bottom:1.35rem;letter-spacing:.3px}
.badge-dot{width:7px;height:7px;border-radius:50%;background:var(--green);animation:blink 2.2s ease-in-out infinite}
@keyframes blink{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.3;transform:scale(1.6)}}
h1{font-size:clamp(2.1rem,4.2vw,3.7rem);font-weight:900;line-height:1.07;letter-spacing:-2.5px;color:#fff;margin-bottom:1rem}
.grad{background:linear-gradient(100deg,#818cf8 0%,#a78bfa 45%,#22d3ee 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
.chips{display:flex;flex-wrap:wrap;gap:.45rem;margin-bottom:1.4rem}
.chip{display:inline-flex;align-items:center;gap:.32rem;background:rgba(99,102,241,.08);border:1px solid rgba(99,102,241,.22);color:var(--indigo);font-size:.75rem;font-weight:700;padding:.28rem .78rem;border-radius:999px}
.hero-bio{color:var(--subtle);font-size:.95rem;line-height:1.85;margin-bottom:1.6rem;max-width:510px}
.hero-bio strong{color:var(--text)}
.qinfo{display:grid;grid-template-columns:repeat(2,auto);gap:.5rem 1.2rem;margin-bottom:2rem;width:fit-content}
.qi{display:flex;align-items:center;gap:.45rem;font-size:.83rem;color:var(--subtle)}
.qi span{color:var(--text);font-weight:600}
.cta-row{display:flex;flex-wrap:wrap;gap:.8rem;margin-bottom:1.6rem}
.btn{display:inline-flex;align-items:center;gap:.5rem;padding:.82rem 1.6rem;border-radius:12px;font-family:inherit;font-size:.88rem;font-weight:700;text-decoration:none;transition:transform .22s,box-shadow .22s,border-color .22s,color .22s;white-space:nowrap}
.btn-primary{background:linear-gradient(135deg,var(--accent) 0%,#4f46e5 100%);color:#fff;box-shadow:0 4px 22px rgba(99,102,241,.32)}
.btn-primary:hover{transform:translateY(-3px);box-shadow:0 8px 30px rgba(99,102,241,.55)}
.btn-ghost{background:rgba(255,255,255,.03);color:var(--subtle);border:1px solid var(--border2)}
.btn-ghost:hover{border-color:var(--indigo);color:var(--indigo);transform:translateY(-2px)}
.platforms{display:flex;flex-wrap:wrap;gap:.55rem}
.plink{display:inline-flex;align-items:center;gap:.42rem;padding:.44rem .95rem;border-radius:999px;font-size:.78rem;font-weight:700;text-decoration:none;border:1px solid transparent;transition:transform .2s,box-shadow .2s}
.plink:hover{transform:translateY(-2px)}
.plink-li{background:rgba(10,102,194,.1);border-color:rgba(10,102,194,.28);color:#60a8e8}
.plink-li:hover{background:rgba(10,102,194,.2);box-shadow:0 4px 14px rgba(10,102,194,.22)}
.plink-fv{background:rgba(29,191,115,.09);border-color:rgba(29,191,115,.28);color:#1dbf73}
.plink-fv:hover{background:rgba(29,191,115,.18);box-shadow:0 4px 14px rgba(29,191,115,.2)}
.plink-up{background:rgba(20,187,117,.09);border-color:rgba(20,187,117,.28);color:#14bb75}
.plink-up:hover{background:rgba(20,187,117,.18);box-shadow:0 4px 14px rgba(20,187,117,.2)}
/* PHOTO */
.hero-photo{display:flex;justify-content:center;align-items:center}
.photo-wrap{position:relative;width:min(300px,75vw);aspect-ratio:4/5}
.photo-ring{position:absolute;inset:-3px;border-radius:calc(var(--r) + 4px);background:linear-gradient(135deg,var(--accent),var(--purple),var(--cyan),var(--accent));background-size:300% 300%;animation:ringShift 6s linear infinite;z-index:0}
@keyframes ringShift{0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%}}
.photo-ring-inner{position:absolute;inset:2px;border-radius:calc(var(--r) + 2px);background:var(--bg);z-index:0}
.photo-frame{position:relative;z-index:1;width:100%;height:100%;border-radius:var(--r);overflow:hidden}
.photo-frame img{width:100%;height:100%;object-fit:cover;object-position:top center;display:block}
.initials-fb{width:100%;height:100%;background:linear-gradient(135deg,var(--accent),var(--purple));display:flex;align-items:center;justify-content:center;font-size:5.5rem;font-weight:900;color:#fff}
.fcard{position:absolute;background:rgba(8,13,28,.92);border:1px solid var(--border2);border-radius:13px;padding:.65rem 1rem;backdrop-filter:blur(20px);z-index:2;white-space:nowrap}
.fc1{top:18px;left:-56px;animation:fFloat 4s ease-in-out infinite}
.fc2{bottom:30px;right:-48px;animation:fFloat 4s ease-in-out infinite;animation-delay:-2s}
@keyframes fFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
.fcard-label{font-size:.63rem;color:var(--muted);text-transform:uppercase;letter-spacing:1px;margin-bottom:.12rem}
.fcard-value{font-size:.88rem;font-weight:800;color:#fff}
.fcard-value .hi{color:var(--indigo)}
/* STATS */
.stats-strip{border-top:1px solid var(--border);border-bottom:1px solid var(--border);background:var(--surface);padding:2.2rem 1.5rem}
.stats-inner{max-width:1120px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr);gap:1rem}
.stat{text-align:center;padding:.5rem;position:relative}
.stat:not(:last-child)::after{content:'';position:absolute;right:0;top:20%;bottom:20%;width:1px;background:var(--border2)}
.stat-num{font-size:clamp(1.8rem,3vw,2.6rem);font-weight:900;letter-spacing:-1.5px;background:linear-gradient(100deg,var(--indigo),var(--purple));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1;margin-bottom:.3rem}
.stat-label{font-size:.8rem;color:var(--subtle);font-weight:600;letter-spacing:.3px}
/* MARQUEE */
.marquee-wrap{overflow:hidden;padding:1.6rem 0;border-bottom:1px solid var(--border);background:var(--surface);position:relative}
.marquee-wrap::before,.marquee-wrap::after{content:'';position:absolute;top:0;bottom:0;width:120px;z-index:2}
.marquee-wrap::before{left:0;background:linear-gradient(to right,var(--surface),transparent)}
.marquee-wrap::after{right:0;background:linear-gradient(to left,var(--surface),transparent)}
.marquee-track{display:flex;animation:marqueeScroll 28s linear infinite;width:max-content}
.marquee-track:hover{animation-play-state:paused}
@keyframes marqueeScroll{from{transform:translateX(0)}to{transform:translateX(-50%)}}
.mtag{display:inline-flex;align-items:center;gap:.4rem;padding:.38rem 1.1rem;margin:0 .35rem;background:rgba(255,255,255,.03);border:1px solid var(--border2);border-radius:999px;font-size:.78rem;font-weight:600;color:var(--subtle);white-space:nowrap;transition:color .2s,border-color .2s}
.mtag:hover{color:var(--indigo);border-color:rgba(99,102,241,.35)}
.mtag .dot{width:5px;height:5px;border-radius:50%;background:var(--accent)}
/* SECTIONS */
.section{max-width:1120px;margin:0 auto;padding:5.5rem 1.5rem}
.eyebrow{display:inline-flex;align-items:center;gap:.5rem;font-size:.68rem;font-weight:800;letter-spacing:2.5px;text-transform:uppercase;color:var(--accent);margin-bottom:.6rem}
.eyebrow::before{content:'';width:16px;height:2px;border-radius:2px;background:var(--accent)}
.sh{font-size:clamp(1.65rem,2.8vw,2.35rem);font-weight:900;letter-spacing:-1.2px;color:#fff;margin-bottom:.5rem;line-height:1.15}
.sh em{font-style:normal;background:linear-gradient(100deg,var(--indigo),var(--purple));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
.sh-sub{color:var(--subtle);font-size:.92rem;max-width:520px;margin-bottom:3rem}
.divider{height:1px;max-width:1120px;margin:0 auto;padding:0 1.5rem;background:linear-gradient(90deg,transparent,var(--border2),transparent)}
/* SERVICES */
.svc-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem}
.svc-card{background:var(--card);border:1px solid var(--border);border-radius:var(--r);padding:1.75rem;position:relative;overflow:hidden;transition:border-color .3s,transform .3s;cursor:default}
.svc-card::before{content:attr(data-n);position:absolute;top:1rem;right:1.25rem;font-size:3rem;font-weight:900;color:rgba(99,102,241,.07);line-height:1;letter-spacing:-2px;transition:color .3s}
.svc-card::after{content:'';position:absolute;bottom:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--accent),var(--purple));transform:scaleX(0);transform-origin:left;transition:transform .35s ease}
.svc-card:hover{border-color:rgba(99,102,241,.4);transform:translateY(-4px)}
.svc-card:hover::before{color:rgba(99,102,241,.12)}
.svc-card:hover::after{transform:scaleX(1)}
.svc-icon{width:48px;height:48px;background:rgba(99,102,241,.1);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:1.1rem;transition:background .3s,transform .3s}
.svc-card:hover .svc-icon{background:rgba(99,102,241,.18);transform:scale(1.08)}
.svc-title{font-size:.97rem;font-weight:800;color:#fff;margin-bottom:.45rem}
.svc-desc{font-size:.85rem;color:var(--subtle);line-height:1.72}
/* PROJECT */
.project-card{background:var(--card);border:1px solid var(--border2);border-radius:22px;overflow:hidden;display:grid;grid-template-columns:1.05fr 1fr;transition:border-color .3s}
.project-card:hover{border-color:rgba(99,102,241,.35)}
.proj-visual{background:linear-gradient(145deg,#080f22 0%,#130530 55%,#060e1f 100%);display:flex;align-items:center;justify-content:center;padding:2.5rem 2rem;min-height:400px;position:relative;overflow:hidden}
.proj-visual::before{content:'';position:absolute;inset:0;background:radial-gradient(circle at 50% 50%,rgba(99,102,241,.18) 0%,transparent 65%)}
.browser{width:100%;max-width:310px;background:#070c1a;border-radius:10px;border:1px solid rgba(255,255,255,.07);overflow:hidden;position:relative;z-index:1;box-shadow:0 28px 70px rgba(0,0,0,.7),0 0 0 1px rgba(99,102,241,.1)}
.browser-bar{background:#0f1828;padding:.5rem .85rem;display:flex;align-items:center;gap:.4rem;border-bottom:1px solid rgba(255,255,255,.05)}
.bd{width:8px;height:8px;border-radius:50%}
.bd-r{background:#ff5f57}.bd-y{background:#febc2e}.bd-g{background:#28c840}
.burl{flex:1;margin-left:.35rem;background:rgba(255,255,255,.05);border-radius:5px;padding:.2rem .65rem;font-size:.64rem;color:var(--muted)}
.browser-body{padding:1.1rem}
.bb-logo{font-size:.72rem;font-weight:800;color:var(--indigo);margin-bottom:.15rem}
.bb-sub{font-size:.65rem;color:var(--muted);margin-bottom:.85rem}
.bb-field{background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07);border-radius:6px;padding:.42rem .65rem;width:100%;font-size:.68rem;color:var(--subtle);margin-bottom:.4rem}
.bb-row{display:flex;gap:.4rem;margin-top:.1rem}
.bb-btn{flex:1;display:flex;align-items:center;justify-content:center;background:var(--accent);color:#fff;border-radius:6px;padding:.42rem .65rem;font-size:.68rem;font-weight:700}
.bb-link{font-size:.64rem;color:var(--muted);display:flex;align-items:center;padding:.42rem .5rem}
.proj-info{padding:2.5rem;display:flex;flex-direction:column;justify-content:center;gap:.8rem}
.proj-tag{display:inline-block;background:rgba(99,102,241,.1);border:1px solid rgba(99,102,241,.26);color:var(--indigo);font-size:.68rem;font-weight:800;letter-spacing:1.5px;text-transform:uppercase;padding:.26rem .78rem;border-radius:999px;width:fit-content}
.proj-name{font-size:1.85rem;font-weight:900;letter-spacing:-1.2px;color:#fff;line-height:1.1}
.proj-tagline{color:var(--indigo);font-weight:700;font-size:.88rem}
.proj-desc{color:var(--subtle);font-size:.88rem;line-height:1.8}
.proj-highlights{list-style:none;display:flex;flex-direction:column;gap:.45rem}
.proj-highlights li{display:flex;align-items:flex-start;gap:.5rem;font-size:.85rem;color:var(--subtle)}
.proj-highlights li::before{content:'✓';color:var(--green);font-weight:800;flex-shrink:0;margin-top:.05rem}
.proj-pills{display:flex;flex-wrap:wrap;gap:.4rem}
.pill{background:rgba(255,255,255,.03);border:1px solid var(--border2);color:var(--muted);font-size:.72rem;font-weight:600;padding:.24rem .65rem;border-radius:6px}
.proj-link{display:inline-flex;align-items:center;gap:.5rem;background:linear-gradient(135deg,var(--accent),#4f46e5);color:#fff;text-decoration:none;padding:.8rem 1.6rem;border-radius:11px;font-weight:800;font-size:.86rem;width:fit-content;box-shadow:0 4px 18px rgba(99,102,241,.28);transition:transform .2s,box-shadow .2s}
.proj-link:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(99,102,241,.48)}
/* SKILLS */
.skills-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem}
.sk-card{background:var(--card);border:1px solid var(--border);border-radius:var(--r);padding:1.4rem;transition:border-color .3s,transform .3s,background .3s}
.sk-card:hover{border-color:rgba(99,102,241,.4);background:var(--card2);transform:translateY(-3px)}
.sk-head{display:flex;align-items:center;gap:.6rem;margin-bottom:1rem}
.sk-icon{width:36px;height:36px;background:rgba(99,102,241,.1);border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:1.05rem;transition:background .3s,transform .3s}
.sk-card:hover .sk-icon{background:rgba(99,102,241,.2);transform:rotate(-5deg) scale(1.1)}
.sk-title{font-weight:800;font-size:.86rem;color:#fff}
.sk-tags{display:flex;flex-wrap:wrap;gap:.32rem}
.stag{background:rgba(255,255,255,.03);border:1px solid var(--border);color:var(--subtle);font-size:.71rem;font-weight:600;padding:.18rem .5rem;border-radius:5px;transition:color .2s,border-color .2s}
.sk-card:hover .stag{color:var(--indigo);border-color:rgba(99,102,241,.22)}
/* EXPERIENCE */
.exp-list-wrap{display:flex;flex-direction:column;gap:1.1rem}
.exp-card{background:var(--card);border:1px solid var(--border);border-radius:var(--r);padding:2rem 2.25rem;position:relative;overflow:hidden;transition:border-color .3s,transform .3s}
.exp-card::before{content:'';position:absolute;left:0;top:0;bottom:0;width:3px;background:linear-gradient(to bottom,var(--accent),var(--purple));border-radius:3px}
.exp-card:hover{border-color:rgba(99,102,241,.35);transform:translateX(4px)}
.exp-top{display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:.8rem;margin-bottom:1.25rem}
.exp-role{font-size:1.1rem;font-weight:800;color:#fff}
.exp-company{color:var(--indigo);font-weight:700;font-size:.88rem;margin-top:.2rem}
.exp-period{background:rgba(99,102,241,.09);border:1px solid rgba(99,102,241,.22);color:var(--indigo);font-size:.73rem;font-weight:700;padding:.3rem .85rem;border-radius:999px;white-space:nowrap}
.exp-points{list-style:none;display:flex;flex-direction:column;gap:.5rem}
.exp-points li{color:var(--subtle);font-size:.88rem;padding-left:1.25rem;position:relative;line-height:1.65}
.exp-points li::before{content:'▸';position:absolute;left:0;color:var(--accent);font-size:.8rem;top:.08rem}
.comp-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(195px,1fr));gap:.6rem;margin-top:2.5rem}
.comp-item{background:var(--card);border:1px solid var(--border);border-radius:10px;padding:.72rem 1rem;display:flex;align-items:center;gap:.55rem;font-size:.83rem;color:var(--subtle);font-weight:600;transition:border-color .2s,color .2s,transform .2s}
.comp-item:hover{border-color:var(--accent);color:var(--text);transform:translateX(4px)}
.cdot{width:6px;height:6px;border-radius:50%;background:var(--accent);flex-shrink:0}
/* CONTACT */
.contact-card{background:var(--card);border:1px solid var(--border2);border-radius:24px;padding:5rem 2rem;text-align:center;position:relative;overflow:hidden}
.contact-card::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 70% 55% at 50% -10%,rgba(99,102,241,.12) 0%,transparent 60%),radial-gradient(ellipse 40% 40% at 80% 90%,rgba(167,139,250,.07) 0%,transparent 50%);pointer-events:none}
.contact-card>*{position:relative;z-index:1}
.contact-eyebrow{display:inline-flex;align-items:center;gap:.45rem;font-size:.68rem;font-weight:800;letter-spacing:2.5px;text-transform:uppercase;color:var(--accent);margin-bottom:.65rem}
.contact-eyebrow::before{content:'';width:14px;height:2px;background:var(--accent);border-radius:2px}
.contact-card h2{font-size:clamp(1.8rem,4vw,2.5rem);font-weight:900;letter-spacing:-1.5px;color:#fff;margin-bottom:.75rem;line-height:1.1}
.contact-card p{color:var(--subtle);font-size:.94rem;max-width:440px;margin:0 auto 2.5rem;line-height:1.8}
.contact-btns{display:flex;justify-content:center;gap:1rem;flex-wrap:wrap}
.cbtn-main{display:inline-flex;align-items:center;gap:.5rem;background:linear-gradient(135deg,var(--accent),#4f46e5);color:#fff;text-decoration:none;padding:1rem 2.1rem;border-radius:14px;font-weight:800;font-size:.9rem;box-shadow:0 4px 22px rgba(99,102,241,.32);transition:transform .2s,box-shadow .2s}
.cbtn-main:hover{transform:translateY(-3px);box-shadow:0 8px 32px rgba(99,102,241,.52)}
.cbtn-sec{display:inline-flex;align-items:center;gap:.5rem;background:transparent;color:var(--subtle);text-decoration:none;padding:1rem 2.1rem;border-radius:14px;font-weight:800;font-size:.9rem;border:1px solid var(--border2);transition:border-color .2s,color .2s,transform .2s}
.cbtn-sec:hover{border-color:var(--indigo);color:var(--indigo);transform:translateY(-2px)}
footer{text-align:center;padding:2rem 1rem;border-top:1px solid var(--border);color:var(--muted);font-size:.78rem;font-weight:600;letter-spacing:.3px}
footer a{color:var(--muted);text-decoration:none;transition:color .2s}
footer a:hover{color:var(--indigo)}
.reveal{opacity:0;transform:translateY(24px);transition:opacity .65s ease,transform .65s ease}
.reveal.up{opacity:1;transform:translateY(0)}
/* RESPONSIVE */
@media(max-width:920px){
  .hero-inner{grid-template-columns:1fr;text-align:center;gap:3rem}
  .badge,.cta-row,.chips,.platforms{justify-content:center}
  .qinfo{grid-template-columns:1fr;margin:0 auto 1.75rem}
  .qi{justify-content:center}
  .hero-bio{max-width:100%}
  .hero-photo{order:-1}
  .photo-wrap{width:min(240px,65vw)}
  .fcard{display:none}
  .stats-inner{grid-template-columns:repeat(2,1fr)}
  .stat:nth-child(2)::after,.stat:nth-child(3)::after{display:none}
  .svc-grid{grid-template-columns:repeat(2,1fr)}
  .skills-grid{grid-template-columns:repeat(2,1fr)}
  .project-card{grid-template-columns:1fr}
  .proj-visual{min-height:240px;order:-1}
  .proj-info{padding:2rem 1.5rem}
  .proj-link{width:100%;justify-content:center}
}
@media(max-width:640px){
  nav{gap:.9rem;padding:.5rem 1.1rem}
  nav a{font-size:.75rem}
  .hero{padding:6rem 1.25rem 3.5rem}
  .svc-grid{grid-template-columns:1fr}
  .skills-grid{grid-template-columns:1fr}
  .section{padding:3.5rem 1.25rem}
  .exp-card{padding:1.5rem 1.5rem 1.5rem 1.75rem}
  .contact-card{padding:3rem 1.25rem}
}
@media(max-width:420px){
  nav{gap:.6rem;padding:.45rem .85rem}
  nav a{font-size:.71rem}
  .nav-cta{padding:.36rem .85rem!important}
  .hero{padding:5.5rem 1rem 3rem}
  h1{font-size:1.9rem;letter-spacing:-1px}
  .stats-inner{grid-template-columns:1fr 1fr}
  .stat::after{display:none!important}
  .cta-row{flex-direction:column}
  .btn{width:100%;justify-content:center}
  .contact-btns{flex-direction:column;align-items:stretch}
  .cbtn-main,.cbtn-sec{justify-content:center}
  .comp-grid{grid-template-columns:1fr 1fr}
}
</style>
</head>
<body>
<div id="glow"></div>

<div class="nav-wrap">
  <nav>
    <a href="#about">About</a>
    <a href="#services">Services</a>
    <a href="#work">Work</a>
    <a href="#skills">Skills</a>
    <a href="#experience">Experience</a>
    <a href="#contact" class="nav-cta">Hire Me ✦</a>
  </nav>
</div>

<!-- HERO -->
<section class="hero" id="about">
  <div class="o1 orb"></div><div class="o2 orb"></div>
  <div class="hero-inner">
    <div class="hero-text">
      <div class="badge"><span class="badge-dot"></span> Available for freelance projects</div>
      <h1>Building the web,<br><span class="grad">one line at a time.</span></h1>
      <div class="chips">
        <span class="chip">🌐 Web Developer</span>
        <span class="chip">✍️ Academic Writer</span>
        <span class="chip">🗄️ Database Engineer</span>
        <span class="chip">🔒 IT &amp; Security</span>
      </div>
      <p class="hero-bio">
        I'm <strong><?= $name ?></strong> — a Nairobi-based web developer, IT professional, and academic writer. Since 2022 I've served global clients on Fiverr, Upwork, and LinkedIn, delivering everything from full-stack web applications and enterprise systems to polished academic research. I combine technical precision with creative thinking to produce work that genuinely makes a difference.
      </p>
      <div class="qinfo">
        <div class="qi">📍 &nbsp;<span>Nairobi, Kenya</span></div>
        <div class="qi">✉️ &nbsp;<span><?= $email ?></span></div>
        <div class="qi">📞 &nbsp;<span><?= $phone ?></span></div>
        <div class="qi">🗣️ &nbsp;<span>English · Swahili</span></div>
      </div>
      <div class="cta-row">
        <a class="btn btn-primary" href="#work">See My Work ↓</a>
        <a class="btn btn-ghost" href="mailto:<?= $email ?>">✉ Let's Talk</a>
      </div>
      <div class="platforms">
        <?php if($p['linkedin']): ?><a href="<?= e($p['linkedin']) ?>" class="plink plink-li" target="_blank" rel="noopener"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>LinkedIn</a><?php endif; ?>
        <?php if($p['fiverr']): ?><a href="<?= e($p['fiverr']) ?>" class="plink plink-fv" target="_blank" rel="noopener"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M23 9H13V6c0-.6.4-1 1-1h2V1h-3c-2.8 0-5 2.2-5 5v3H6v4h2v10h4V13h4l1 4h4l-1.5-4.5c.9-.5 1.5-1.4 1.5-2.5V9z"/><circle cx="7" cy="5" r="1.5"/></svg>Fiverr</a><?php endif; ?>
        <?php if($p['upwork']): ?><a href="<?= e($p['upwork']) ?>" class="plink plink-up" target="_blank" rel="noopener"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18.4 8.1a4.9 4.9 0 0 0-4.7 3.5l-.3 1.2c-.2.8-.4 2.3-.4 2.3-.3 1.8-1.3 2.9-2.8 2.9-1.7 0-3.2-1.4-3.2-3.4S8.5 11 10.2 11c.3 0 .6 0 .9.1V7.4c-.3 0-.6-.1-.9-.1C6.2 7.3 3 10.4 3 14.6S6.2 22 10.2 22c3.3 0 5.5-2.2 5.9-5.5l.3-1.8c.1-.7.3-1.6.6-2.4.5-1.2 1.3-1.9 2.4-1.9 1.4 0 2.6 1.2 2.6 2.9 0 1.8-1.1 2.9-2.6 2.9-.6 0-1.2-.2-1.7-.5L17 19c.5.2 1 .3 1.4.3 3.1 0 5.6-2.5 5.6-5.7C24 10.5 21.5 8.1 18.4 8.1z"/></svg>Upwork</a><?php endif; ?>
      </div>
    </div>
    <div class="hero-photo">
      <div class="photo-wrap">
        <div class="photo-ring"></div><div class="photo-ring-inner"></div>
        <div class="photo-frame">
          <?php $avatarPath = dirname(__DIR__) . '/public/' . $p['avatar']; ?>
          <?php if(file_exists($avatarPath)): ?>
            <img src="/<?= e($p['avatar']) ?>" alt="<?= $name ?>">
          <?php else: ?>
            <div class="initials-fb">FK</div>
          <?php endif; ?>
        </div>
        <div class="fcard fc1"><div class="fcard-label">Specialty</div><div class="fcard-value">Full-<span class="hi">Stack</span> Dev</div></div>
        <div class="fcard fc2"><div class="fcard-label">Freelance since</div><div class="fcard-value"><span class="hi">2022</span> · 3 Platforms</div></div>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<div class="stats-strip">
  <div class="stats-inner">
    <div class="stat reveal"><div class="stat-num" data-target="3">0</div><div class="stat-label">Years Freelancing</div></div>
    <div class="stat reveal"><div class="stat-num" data-target="3" data-suffix="+">0</div><div class="stat-label">Live Web Projects</div></div>
    <div class="stat reveal"><div class="stat-num" data-target="3">0</div><div class="stat-label">Freelance Platforms</div></div>
    <div class="stat reveal"><div class="stat-num" data-target="100" data-suffix="%">0</div><div class="stat-label">Client Satisfaction</div></div>
  </div>
</div>

<!-- MARQUEE -->
<?php
$tags = ['PHP','Laravel','MySQL','JavaScript','HTML5','CSS3','Java','C++','PostgreSQL','TCP/IP','Linux','WordPress','ERP Systems','Academic Writing','CRM','REST APIs','Cybersecurity','Database Design','Responsive Web','SEO','Git','SME Solutions'];
$allTags = array_merge($tags, $tags);
?>
<div class="marquee-wrap">
  <div class="marquee-track">
    <?php foreach($allTags as $t): ?><span class="mtag"><span class="dot"></span><?= e($t) ?></span><?php endforeach; ?>
  </div>
</div>

<!-- SERVICES -->
<div class="section" id="services">
  <div class="reveal">
    <p class="eyebrow">What I Offer</p>
    <h2 class="sh">Services Built to <em>Deliver Results</em></h2>
    <p class="sh-sub">From custom web apps to academic writing — I bring expertise, reliability, and quality to every engagement.</p>
  </div>
  <div class="svc-grid">
    <?php foreach($p['services'] as $i => $svc): ?>
    <div class="svc-card reveal" data-n="<?= str_pad($i+1,2,'0',STR_PAD_LEFT) ?>">
      <div class="svc-icon"><?= $svc['icon'] ?></div>
      <div class="svc-title"><?= e($svc['title']) ?></div>
      <div class="svc-desc"><?= e($svc['desc']) ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<div class="divider"></div>

<!-- PROJECT -->
<div class="section" id="work">
  <div class="reveal">
    <p class="eyebrow">Featured Project</p>
    <h2 class="sh">Work That <em>Ships &amp; Scales</em></h2>
    <p class="sh-sub">A real-world application built from the ground up — designed, developed, and deployed solo.</p>
  </div>
  <?php foreach($p['projects'] as $project): ?>
  <div class="project-card reveal">
    <div class="proj-visual">
      <div class="browser">
        <div class="browser-bar">
          <div class="bd bd-r"></div><div class="bd bd-y"></div><div class="bd bd-g"></div>
          <div class="burl"><?= e($project['url']) ?></div>
        </div>
        <div class="browser-body">
          <div class="bb-logo">SMEManager ✦</div>
          <div class="bb-sub">Business Management Portal</div>
          <div class="bb-field">✉ Email address</div>
          <div class="bb-field">🔒 Password</div>
          <div class="bb-row"><div class="bb-btn">Sign In →</div><div class="bb-link">Forgot password?</div></div>
        </div>
      </div>
    </div>
    <div class="proj-info">
      <span class="proj-tag">✦ Live Project</span>
      <div class="proj-name"><?= e($project['name']) ?></div>
      <div class="proj-tagline"><?= e($project['tagline']) ?></div>
      <div class="proj-desc"><?= e($project['desc']) ?></div>
      <ul class="proj-highlights">
        <?php foreach($project['highlights'] as $h): ?><li><?= e($h) ?></li><?php endforeach; ?>
      </ul>
      <div class="proj-pills">
        <?php foreach($project['tags'] as $tag): ?><span class="pill"><?= e($tag) ?></span><?php endforeach; ?>
      </div>
      <a class="proj-link" href="<?= e($project['url']) ?>" target="_blank" rel="noopener">Visit Live Site ↗</a>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<div class="divider"></div>

<!-- SKILLS -->
<div class="section" id="skills">
  <div class="reveal">
    <p class="eyebrow">Expertise</p>
    <h2 class="sh">Technical <em>Skills</em></h2>
    <p class="sh-sub">A broad, deep toolkit built across years of hands-on development, freelancing, and IT work.</p>
  </div>
  <div class="skills-grid">
    <?php foreach($p['skills'] as $group): ?>
    <div class="sk-card reveal">
      <div class="sk-head"><div class="sk-icon"><?= $group['icon'] ?></div><div class="sk-title"><?= e($group['category']) ?></div></div>
      <div class="sk-tags">
        <?php foreach($group['items'] as $item): ?><span class="stag"><?= e($item) ?></span><?php endforeach; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<div class="divider"></div>

<!-- EXPERIENCE -->
<div class="section" id="experience">
  <div class="reveal">
    <p class="eyebrow">Career</p>
    <h2 class="sh">Professional <em>Experience</em></h2>
    <p class="sh-sub">Hands-on work across web development, freelancing, and client services.</p>
  </div>
  <div class="exp-list-wrap">
    <?php foreach($p['experience'] as $job): ?>
    <div class="exp-card reveal">
      <div class="exp-top">
        <div><div class="exp-role"><?= e($job['role']) ?></div><div class="exp-company"><?= e($job['company']) ?></div></div>
        <span class="exp-period"><?= e($job['period']) ?></span>
      </div>
      <ul class="exp-points">
        <?php foreach($job['highlights'] as $h): ?><li><?= e($h) ?></li><?php endforeach; ?>
      </ul>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="comp-grid">
    <?php foreach($p['competencies'] as $c): ?><div class="comp-item reveal"><span class="cdot"></span><?= e($c) ?></div><?php endforeach; ?>
  </div>
</div>

<div class="divider"></div>

<!-- CONTACT -->
<div class="section" id="contact">
  <div class="contact-card reveal">
    <p class="contact-eyebrow">Get In Touch</p>
    <h2>Let's Build Something <span class="grad">Amazing</span></h2>
    <p>Got a project, a brief, or just an idea? Whether it's a web app, academic work, or IT consulting — I'd love to hear from you.</p>
    <div class="contact-btns">
      <a class="cbtn-main" href="mailto:<?= $email ?>">✉ <?= $email ?></a>
      <?php if($p['phone']): ?><a class="cbtn-sec" href="tel:<?= e($p['phone']) ?>">📞 <?= $phone ?></a><?php endif; ?>
    </div>
  </div>
</div>

<footer>
  <span>&copy; <?= $year ?> <?= $name ?> &nbsp;·&nbsp; Nairobi, Kenya &nbsp;·&nbsp;</span>
  <?php if($p['fiverr']): ?><a href="<?= e($p['fiverr']) ?>" target="_blank">Fiverr</a> &nbsp;·&nbsp; <?php endif; ?>
  <?php if($p['upwork']): ?><a href="<?= e($p['upwork']) ?>" target="_blank">Upwork</a> &nbsp;·&nbsp; <?php endif; ?>
  <?php if($p['linkedin']): ?><a href="<?= e($p['linkedin']) ?>" target="_blank">LinkedIn</a><?php endif; ?>
</footer>

<script>
if(window.matchMedia('(pointer:fine)').matches){const g=document.getElementById('glow');document.addEventListener('mousemove',e=>{g.style.left=e.clientX+'px';g.style.top=e.clientY+'px'})}
const io=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('up');io.unobserve(e.target)}})},{threshold:0.08});
document.querySelectorAll('.reveal').forEach((el,i)=>{el.style.transitionDelay=`${(i%4)*65}ms`;io.observe(el)});
const co=new IntersectionObserver(entries=>{entries.forEach(entry=>{if(!entry.isIntersecting)return;const el=entry.target,target=parseInt(el.dataset.target),suffix=el.dataset.suffix||'',dur=1400,step=16,steps=dur/step;let cur=0;const inc=target/steps,timer=setInterval(()=>{cur+=inc;if(cur>=target){cur=target;clearInterval(timer)}el.textContent=Math.floor(cur)+suffix},step);co.unobserve(el)})},{threshold:0.4});
document.querySelectorAll('.stat-num[data-target]').forEach(el=>co.observe(el));
</script>
</body>
</html>
<?php
echo ob_get_clean();
