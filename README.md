# NESCON - Event Management System (3-Tier)
**Student:** Muhammad Zaid - FA23-BCS-090
**Task 1:** CI/CD Pipeline for Event Management System using Jenkins, Docker, Kubernetes (Minikube)

## Architecture - 3 Tier
- **Tier 1 - Frontend:** Nginx reverse proxy (port 80)
- **Tier 2 - Backend:** PHP 8.2 + Apache (events, register, registrations pages)
- **Tier 3 - Database:** MySQL 8.0 (events + registrations tables, seeded with 6 NESCON events)

## Run with Docker Compose
```bash
docker compose down -v
docker compose up -d --build
docker ps
# open http://<YOUR_EC2_PUBLIC_IP>/
```

## Run with Kubernetes (Minikube)
```bash
minikube start --driver=docker
eval $(minikube docker-env)
docker build -t nescon-backend:latest .
docker build -f Dockerfile.frontend -t nescon-frontend:latest .
kubectl apply -f k8s/
kubectl get pods
kubectl get svc
```

## Jenkins Pipelines
- `Jenkinsfile` - Docker Compose deployment (job: NESCON-Pipeline)
- `Jenkinsfile.k8s` - Kubernetes deployment (job: NESCON-K8s-Pipeline)
